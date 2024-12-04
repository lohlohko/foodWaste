<?php
include './db_connection.php'; // Pastikan koneksi database Anda benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    // Hapus pengguna berdasarkan ID
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete user"]);
    }

    $stmt->close();
}

$conn->close();
?>
