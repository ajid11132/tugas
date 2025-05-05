<?php
include('conection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f6f8; color: #333;">

    <div style="max-width: 1000px; margin: 40px auto; padding: 20px;">
        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); text-align: center; margin-bottom: 30px;">
            <h2 style="margin-bottom: 10px; color: #2c3e50;">Welcome To Admin Page</h2>
            <p style="font-size: 18px;">admin: <span style="font-weight: bold; color: #2980b9;"><?= isset($_SESSION['admin']) ? $_SESSION['admin'] : 'Guest'; ?></span></p>
            <a href="logout.php"><button style="background: #3498db; color: white; border: none; padding: 10px 20px; font-weight: bold; border-radius: 8px; cursor: pointer; transition: background 0.3s ease;">Logout</button></a>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);">
            <h3 style="margin-bottom: 15px; color: #34495e;">User Data</h3>
            <table style="width: 100%; border-collapse: collapse; border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr style="background: #3498db; color: white; text-transform: uppercase;">
                        <th style="padding: 12px 16px; text-align: left;">No</th>
                        <th style="padding: 12px 16px; text-align: left;">ID</th>
                        <th style="padding: 12px 16px; text-align: left;">Name</th>
                        <th style="padding: 12px 16px; text-align: left;">Email</th>
                        <th style="padding: 12px 16px; text-align: left;">Password</th>
                        <th style="padding: 12px 16px; text-align: left;">User Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $ambildata = mysqli_query($conn, "SELECT * FROM users");
                    while ($tampil = mysqli_fetch_assoc($ambildata)) {
                        echo "
                        <tr style='border-bottom: 1px solid #ddd;'>
                            <td style='padding: 12px 16px;'>{$no}</td>
                            <td style='padding: 12px 16px;'>{$tampil['id']}</td>
                            <td style='padding: 12px 16px;'>{$tampil['name']}</td>
                            <td style='padding: 12px 16px;'>{$tampil['email']}</td>
                            <td style='padding: 12px 16px;'>******</td>
                            <td style='padding: 12px 16px;'>{$tampil['user_type']}</td>
                        </tr>
                        ";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
