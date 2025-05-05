<?php 
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'owner') {
    header('Location: login.php'); // Redirect ke halaman login jika bukan owner
    exit();
}

// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'futsal_db'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pesanan
$sql = "SELECT * FROM pesanan ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner - Pesanan Futsal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        button {
            padding: 10px 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Dashboard Owner</h2>
        <p>Welcome, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong></p>
        <a href="logout.php">
            <button>Logout</button>
        </a>

        <h3>Daftar Pesanan</h3>
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal Main</th>
                    <th>Jam Mulai</th>
                    <th>Durasi (jam)</th>
                    <th>Jenis Lapangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal']) ?></td>
                            <td><?= htmlspecialchars($row['jam_mulai']) ?></td>
                            <td><?= htmlspecialchars($row['durasi']) ?></td>
                            <td><?= htmlspecialchars($row['jenis_lapangan']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php
$conn->close();
?>