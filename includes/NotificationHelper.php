<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/email_config.php';

if (!class_exists('NotificationHelper')) {
    class NotificationHelper {
        private $conn;
        private $mailer;

        public function __construct($conn) {
            $this->conn = $conn;
            // Initialize PHPMailer
            $this->mailer = new PHPMailer\PHPMailer\PHPMailer(true);
            
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host = SMTP_HOST;
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = SMTP_USERNAME;
            $this->mailer->Password = SMTP_PASSWORD;
            $this->mailer->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = SMTP_PORT;
        }

        public function createNotification($userId, $pickupRequestId, $type, $message, $isAdminNotification = false) {
            // Insert notification into database
            $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, pickup_request_id, type, message, is_admin_notification) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iissi", $userId, $pickupRequestId, $type, $message, $isAdminNotification);
            $stmt->execute();
            $stmt->close();

            // Only send email for user notifications, not admin notifications
            if (!$isAdminNotification) {
                // Get user email
                $stmt = $this->conn->prepare("SELECT email, full_name FROM users WHERE user_id = ?");
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                $stmt->close();

                // Send email notification
                $this->sendEmailNotification($user['email'], $user['full_name'], $message);
            }
        }

        public function createAdminNotification($pickupRequestId, $type, $message) {
            // Get all admin users
            $stmt = $this->conn->prepare("SELECT user_id FROM users WHERE role = 'admin'");
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($admin = $result->fetch_assoc()) {
                $this->createNotification($admin['user_id'], $pickupRequestId, $type, $message, true);
            }
            
            $stmt->close();
        }

        private function sendEmailNotification($email, $name, $message) {
            try {
                $this->mailer->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
                $this->mailer->addAddress($email, $name);
                $this->mailer->isHTML(true);
                $this->mailer->Subject = 'Pickup Request Update';
                $this->mailer->Body = "
                    <h2>Pickup Request Update</h2>
                    <p>Dear {$name},</p>
                    <p>{$message}</p>
                    <p>Thank you for using our service!</p>
                ";
                $this->mailer->send();
            } catch (Exception $e) {
                // Log email sending error
                error_log("Email sending failed: " . $e->getMessage());
            }
        }

        public function getUnreadNotifications($userId, $isAdmin = false) {
            $stmt = $this->conn->prepare("
                SELECT n.* 
                FROM notifications n
                WHERE n.user_id = ? AND n.is_read = 0 AND n.is_admin_notification = ?
                ORDER BY n.created_at DESC
                LIMIT 10
            ");
            $stmt->bind_param("ii", $userId, $isAdmin);
            $stmt->execute();
            $result = $stmt->get_result();
            $notifications = [];
            while ($row = $result->fetch_assoc()) {
                $notifications[] = $row;
            }
            $stmt->close();
            return $notifications;
        }

        public function markAsRead($notificationId, $userId) {
            $stmt = $this->conn->prepare("UPDATE notifications SET is_read = 1 WHERE notification_id = ? AND user_id = ?");
            $stmt->bind_param("ii", $notificationId, $userId);
            $stmt->execute();
            $stmt->close();
        }

        public function markAllAsRead($userId) {
            $stmt = $this->conn->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $stmt->close();
        }
    }
} 