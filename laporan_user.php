<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok dan Pengguna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #004080;
            text-align: center;
        }

        h2 {
            color: #0059b3;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #004080;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0066cc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e6f2ff;
        }

        tr:hover {
            background-color: #b3d1ff;
        }

        button {
            background-color: #004080;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        button:hover {
            background-color: #0059b3;
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<h1>Laporan Stok Tersedia dan Terjual beserta Pengguna</h1>
<button onclick="printReport()">Cetak Laporan</button>

<?php
include 'database.php';

$sql = "SELECT u.id, u.username, u.email, COUNT(o.order_id) AS total_transaksi
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.id";

$result = $conn->query($sql);
if (!$result) {
    die("query failed" . $conn->error);
}

echo "<h2>Stok Produk dan Pengguna</h2>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>User ID</th><th>Nama</th><th>Email</th><th>Total Transaksi</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["total_transaksi"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data stok.</p>";
}
?>

</body>
</html>
