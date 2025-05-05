<?php
session_start(); // Memulai session
include("conection.php");

$msg = '';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menggunakan prepared statements untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row1['password'])) {
            if ($row1['user_type'] == 'user') {
                $_SESSION['user'] = $row1['email'];
                $_SESSION['id'] = $row1['id'];
                header('location:user.php');
                exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
            } elseif ($row1['user_type'] == 'admin') {
                $_SESSION['admin'] = $row1['email'];
                $_SESSION['id'] = $row1['id'];
                header('location:admin.php');
                exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
            }
        } else {
            $msg = "Email atau kata sandi salah!";
        }
    } else {
        $msg = "Email atau kata sandi salah!";
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
            <h2>Login</h2>
            <p class="msg"><?= htmlspecialchars($msg); ?></p>
            <div class="form-group">
                <input type="email" name="email" placeholder="Masukan Email Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Masukan Password Anda" class="form-control" required>
            </div>
            <button class="btn font-weight-bold" name="submit">Login Now</button>
            <p>Tidak Memiliki akun? <a href="register.php">Register Now</a></p>
        </form>
    </div>
</body>
</html>