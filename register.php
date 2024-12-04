<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-reg">
    <form action="./includes/auth.php" method="POST">
    <h1>Register</h1>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="phone" name="phone" placeholder="Phone Number" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="role" required>
        <option value="pelanggan">Pelanggan</option>
        <option value="pemilik_toko">Pemilik Toko</option>
        <option value="staf_toko">Staf Toko</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit" name="register">Register</button>
    <p>Already have an account? <a href="./index.php">Login</a></p>
</form>
    </div>
</body>
</html>



