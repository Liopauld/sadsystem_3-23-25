<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
require 'config/db.php';

// Debugging: Ensure session user_id is set
if (!isset($_SESSION['user_id'])) {
    die("Error: User ID not found in session.");
}

$today = date('Y-m-d');

// Fetch assigned pickups for today
$sql = "SELECT ps.schedule_id, ps.request_id, ps.collection_date, ps.collection_time, 
               b.building_name, pr.latitude, pr.longitude, u.full_name AS resident_name
        FROM pickup_schedules ps
        JOIN pickuprequests pr ON ps.request_id = pr.request_id
        JOIN users u ON pr.user_id = u.user_id
        JOIN buildings b ON pr.building_id = b.building_id
        LEFT JOIN reschedule_requests rr ON ps.schedule_id = rr.schedule_id
        WHERE (rr.schedule_id IS NULL OR rr.status = 'Denied') 
        AND ps.collection_date = CURDATE()
        AND pr.status = 'approved'";  // Only show approved pickups

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();
$pickups = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<div class="container mt-4">
    <h2>Today's Assigned Pickups</h2>
    
    <?php if (empty($pickups)): ?>
        <div class="alert alert-info">No pickups assigned for today.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Resident Name</th>
                        <th>Building</th>
                        <th>Collection Time</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pickups as $pickup): ?>
                        <tr>
                            <td><?= htmlspecialchars($pickup['resident_name']) ?></td>
                            <td><?= htmlspecialchars($pickup['building_name']) ?></td>
                            <td><?= date('g:i A', strtotime($pickup['collection_time'])) ?></td>
                            <td>
                                <?php if ($pickup['latitude'] && $pickup['longitude']): ?>
                                    <a href="https://www.google.com/maps?q=<?= $pickup['latitude'] ?>,<?= $pickup['longitude'] ?>" 
                                       target="_blank" class="btn btn-sm btn-info">
                                        <i class="bi bi-geo-alt"></i> View Location
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Location not available</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="update_pickup.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="request_id" value="<?= $pickup['request_id'] ?>">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-check-circle"></i> Complete
                                        </button>
                                    </form>
                                    <a href="reschedule_pickups.php?schedule_id=<?= $pickup['schedule_id'] ?>" 
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-calendar-x"></i> Reschedule
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>