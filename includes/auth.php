<?php
include './db_connection.php';
session_start();
// Login Handler
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            switch ($row['role']) {
                case 'admin':
                    header("Location: ../../../../tugasWebP11-13/src/dashboard.php ");
                    break;
                case 'pemilik_toko':
                    header("Location: ../../../../tugasWebP11-13/src/dashboard.php");
                    break;
                case 'staf_toko':
                    header("Location: ../../../../tugasWebP11-13/src/dashboard.php");
                    break;
                case 'pelanggan':
                    header("Location: ../../../../tugasWebP11-13/src/dashboard.php");
                    break;
            }
            header("Location: ../../../../tugasWebP11-13/src/dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }

    mysqli_stmt_close($stmt);
}

// Register Handler
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $hashedPassword, $role);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
        header("Location: ../../../../tugasWebP11-13/index.php");
        exit();
    } else {
        echo "Registration failed!";
    }

    mysqli_stmt_close($stmt);
}
//Logout Handler
if (isset($_GET['logout'])) {
    session_destroy();

    $_SESSION = [];

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    header("Pragma: no-cache");

    header("Location:../../../../tugasWebP11-13/index.php");
    exit();
}

?>


