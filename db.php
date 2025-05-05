<?php
$host = '127.0.0.1'; // Alamat server database
$username = 'root'; // Nama pengguna database (biasanya 'root' untuk localhost)
$password = ''; // Password untuk pengguna database
$dbname = 'sales_db'; // Nama database yang telah dibuat

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$insert = "INSERT INTO sales (user, product_name, price, quantity) VALUES ('$user', '$product', $price, $quantity)";
$success = mysqli_query($conn, $insert);

$sql = "SELECT * FROM sales";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>   
                <th>Sale Date</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['user']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['sale_date']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No sales data found.";
}



?>
