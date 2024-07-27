<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tahunan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6e6;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #990000;
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        select, button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #990000;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #cc0000;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #b30000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #990000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #cc0000;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2d6d6;
        }

        tr:hover {
            background-color: #e6b3b3;
        }

        .print-button {
            margin-top: 20px;
            display: block;
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
        }

        .print-button:hover {
            background-color: #b30000;
        }
    </style>
</head>
<body>
    <h1>Laporan Tahunan</h1>

    <form method="GET" action="">
        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" id="tahun">
            <?php
            $currentYear = date("Y");
            for ($i = 2020; $i <= $currentYear; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>
        <button type="submit">Tampilkan Laporan</button>
    </form>

    <?php
    include 'database.php';

    if (isset($_GET['tahun'])) {
        $tahun = $_GET['tahun'];

        $sql = "SELECT p.name, SUM(o.quantity) AS total_jumlah, SUM(o.quantity * p.price) AS total_harga 
                FROM orders o 
                JOIN products p ON o.product_id = p.id 
                WHERE YEAR(o.tanggal) = $tahun 
                GROUP BY p.name";
        $result = $conn->query($sql);

        $total_transaksi = 0;
        $total_nilai = 0;

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Total Jumlah</th>
                        <th>Total Harga</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["total_jumlah"] . "</td>
                        <td>" . number_format($row["total_harga"], 2, ',', '.') . "</td>
                      </tr>";
                $total_transaksi += $row["total_jumlah"];
                $total_nilai += $row["total_harga"];
            }
            echo "</table>";
            echo "<p>Total Jumlah Transaksi: " . $total_transaksi . "</p>";
            echo "<p>Total Nilai Transaksi: Rp " . number_format($total_nilai, 2, ',', '.') . "</p>";

            // Tombol cetak
            echo '<button class="print-button" onclick="window.print()">Cetak Laporan</button>';
        } else {
            echo "<p>Tidak ada hasil untuk tahun yang dipilih</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
