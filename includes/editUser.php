<?php
include './db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "UPDATE users SET name = ?, phone = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $phone, $email, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update user"]);
    }

    $stmt->close();
}

$conn->close();
?>
