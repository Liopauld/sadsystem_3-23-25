<?php
session_start();
require 'config/db.php';
require 'includes/NotificationHelper.php';

// Initialize NotificationHelper
$notificationHelper = new NotificationHelper($conn);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if schedule_id is provided
if (!isset($_GET['schedule_id'])) {
    $_SESSION['error'] = "Schedule ID is required.";
    header("Location: assigned_pickups.php");
    exit();
}

$schedule_id = (int)$_GET['schedule_id'];

// Fetch schedule details
$sql = "SELECT ps.*, pr.request_id, pr.building_id, b.building_name, u.full_name, u.email, u.user_id
        FROM pickup_schedules ps
        JOIN pickuprequests pr ON ps.request_id = pr.request_id
        JOIN buildings b ON pr.building_id = b.building_id
        JOIN users u ON pr.user_id = u.user_id
        WHERE ps.schedule_id = ? AND pr.status = 'approved'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Schedule not found or not eligible for rescheduling.";
    header("Location: assigned_pickups.php");
    exit();
}

$schedule = $result->fetch_assoc();

// Check if there's already a pending reschedule request
$check_sql = "SELECT 1 FROM reschedule_requests WHERE schedule_id = ? AND status = 'Pending'";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("i", $schedule_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    $_SESSION['error'] = "A pending reschedule request already exists for this pickup.";
    header("Location: assigned_pickups.php");
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reason = $_POST['reason'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];
    $request_date = date('Y-m-d H:i:s'); // Current date and time

    // Validate new date and time
    $new_datetime = strtotime($new_date . ' ' . $new_time);
    $current_datetime = time();

    if ($new_datetime <= $current_datetime) {
        $_SESSION['error'] = "New date and time must be in the future.";
    } else {
        // Insert reschedule request
        $insert_sql = "INSERT INTO reschedule_requests (schedule_id, user_id, request_date, new_date, new_time, reason, status) 
                      VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("iissss", $schedule_id, $schedule['user_id'], $request_date, $new_date, $new_time, $reason);
        
        if ($insert_stmt->execute()) {
            // Create notification for admin
            $admin_message = "A new reschedule request has been submitted for pickup on " . 
                           date('F j, Y', strtotime($new_date)) . " at " . 
                           date('g:i A', strtotime($new_time)) . ".";
            
            // Get admin user ID
            $admin_query = "SELECT user_id FROM users WHERE role = 'admin' LIMIT 1";
            $admin_result = $conn->query($admin_query);
            if ($admin_result && $admin_result->num_rows > 0) {
                $admin = $admin_result->fetch_assoc();
                $notificationHelper->createNotification($admin['user_id'], $schedule['request_id'], 'reschedule_request', $admin_message, false);
            }

            // Get all residents in the same building
            $residents_sql = "SELECT user_id, full_name, email FROM users WHERE building_id = ? AND role = 'resident'";
            $residents_stmt = $conn->prepare($residents_sql);
            $residents_stmt->bind_param("i", $schedule['building_id']);
            $residents_stmt->execute();
            $residents_result = $residents_stmt->get_result();

            // Create notification for each resident in the building
            while ($resident = $residents_result->fetch_assoc()) {
                $building_message = "A pickup in your building (" . $schedule['building_name'] . ") has requested rescheduling. " .
                                  "Current schedule: " . date('F j, Y', strtotime($schedule['collection_date'])) . " at " . 
                                  date('g:i A', strtotime($schedule['collection_time'])) . ". " .
                                  "Requested new schedule: " . date('F j, Y', strtotime($new_date)) . " at " . 
                                  date('g:i A', strtotime($new_time)) . ". " .
                                  "Reason: " . $reason;
                
                $notificationHelper->createNotification(
                    $resident['user_id'],
                    $schedule['request_id'],
                    'building_reschedule',
                    $building_message,
                    true  // Set to true to send email notification
                );
            }

            $_SESSION['success'] = "Reschedule request submitted successfully.";
            header("Location: assigned_pickups.php");
            exit();
        } else {
            $_SESSION['error'] = "Error submitting reschedule request.";
        }
    }
}

// Include header after all processing
include 'includes/header.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Request Reschedule</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-4">
                        <h5>Current Schedule Details:</h5>
                        <p><strong>Resident:</strong> <?= htmlspecialchars($schedule['full_name']) ?></p>
                        <p><strong>Building:</strong> <?= htmlspecialchars($schedule['building_name']) ?></p>
                        <p><strong>Current Date:</strong> <?= date('F j, Y', strtotime($schedule['collection_date'])) ?></p>
                        <p><strong>Current Time:</strong> <?= date('g:i A', strtotime($schedule['collection_time'])) ?></p>
                    </div>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="new_date" class="form-label">New Collection Date</label>
                            <input type="date" class="form-control" id="new_date" name="new_date" required 
                                   min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                        </div>

                        <div class="mb-3">
                            <label for="new_time" class="form-label">New Collection Time</label>
                            <input type="time" class="form-control" id="new_time" name="new_time" required>
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason for Rescheduling</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit Reschedule Request</button>
                            <a href="assigned_pickups.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
