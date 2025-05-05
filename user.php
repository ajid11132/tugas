<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page - Order Futsal</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f2f2f2;">

    <div style="background-color: #fff; padding: 20px; border-radius: 8px;">
        <h2 style="margin-top: 0;">Welcome to User Page</h2>
        <p>User: 
            <span style="font-weight: bold;">
                <?= isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : 'Guest'; ?>
            </span>
        </p>
        <a href="logout.php">
            <button style="padding: 10px 15px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
        </a>
    </div>

    <hr style="margin: 30px 0;">

    <!-- Gambar banner futsal -->
    <img src="futsal-banner.jpg" alt="Lapangan Futsal" style="width: 100%; max-height: 300px; object-fit: cover; border-radius: 8px;">

    <h3 style="margin-top: 30px;">Form Pemesanan Lapangan Futsal</h3>
    <form method="POST" action="order_process.php" style="background-color: #fff; padding: 20px; border-radius: 8px; max-width: 400px;">
        <label>Nama Pemesan:</label><br>
        <input type="text" name="nama" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;"><br>

        <label>Tanggal Main:</label><br>
        <input type="date" name="tanggal" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;"><br>

        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;"><br>

        <label>Durasi (jam):</label><br>
        <input type="number" name="durasi" min="1" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;"><br>

        <label>Jenis Lapangan:</label><br>
        <select name="jenis_lapangan" required style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="Indoor">Indoor</option>
            <option value="Outdoor">Outdoor</option>
            <option value="Sintetis">Sintetis</option>
        </select><br>

        <button type="submit" name="submit_order" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Pesan Sekarang</button>
        <button type="reset" style="padding: 10px 15px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">Reset</button>
    </form>

</body>
</html>
