<?php
// getTotalUsers.php
include './db_connection.php';

// Query untuk menghitung total users dengan role "user"
$sql = "SELECT COUNT(*) as total_users FROM users WHERE role = 'pelanggan'";
$result = $conn->query($sql);

$response = ['success' => false, 'total_users' => 0];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['success'] = true;
    $response['total_users'] = $row['total_users'];
}

// Mengembalikan response dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
