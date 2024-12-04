<?php
include './db_connection.php'; // Pastikan koneksi database Anda benar

if (isset($_GET['id'])) {
    // Fetch data spesifik berdasarkan ID
    $id = intval($_GET['id']);
    $query = "SELECT id, name, phone, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "User not found"]);
    }

    $stmt->close();
} else {
    // Fetch semua data pengguna
    $query = "SELECT id, name, phone, email FROM users";
    $result = $conn->query($query);

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($users);
}

$conn->close();
?>
