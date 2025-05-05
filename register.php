<?php
include("conection.php");

$msg = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm'];
    $user_type = $_POST['user_type'];

    // Validasi password
    if ($password !== $cpassword) {
        $msg = "Password dan konfirmasi password tidak cocok.";
    } else {
        // Menggunakan prepared statements untuk mencegah SQL injection
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $msg = "Pengguna Sudah Ada";
        } else {
            // Hash password sebelum menyimpannya
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_stmt = $conn->prepare("INSERT INTO `users`(`name`, `email`, `password`, `user_type`) VALUES (?, ?, ?, ?)");
            $insert_stmt->bind_param("ssss", $name, $email, $hashed_password, $user_type);
            $insert_stmt->execute();
            header("location:login.php");
            exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
        }
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <!-- create form -->
    <div class="form">
        <form action="" method="post">
            <h2>Registration</h2>
            <p class="msg"><?= htmlspecialchars($msg); ?></p>
            <div class="form-group">
                <input type="text" name="name" placeholder="Masukan Nama Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Masukan Email Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <select name="user_type" class="form-control">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="admin">owner</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Masukan Password Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="confirm" placeholder="Konfirmasi Password Anda" class="form-control" required>
            </div>
            <button class="btn font-weight-bold" name="submit">Register Now</button>
            <p>Sudah Memiliki akun? <a href="login.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>