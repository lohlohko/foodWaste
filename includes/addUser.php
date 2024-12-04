<?php
include './db_connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);

    // Simple validation
    if (!empty($name) && !empty($phone) && !empty($email)) {
        // Insert with role 'pelanggan' as default
        $sql = "INSERT INTO users (name, phone, email, role) VALUES ('$name', '$phone', '$email', 'pelanggan')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../../../../tugasWebP11-13/src/customerManage.php?success=1');
        } else {
            header('Location: ../../../../tugasWebP11-13/src/customerManage.php?error=1');
        }
    } else {
        header('Location: ../../../../tugasWebP11-13/src/customerManage.php?error=1');
    }
}
$conn->close();
?>
