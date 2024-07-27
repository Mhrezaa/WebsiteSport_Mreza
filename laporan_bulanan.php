<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        h1 {
            color: #2e8b57;
            text-align: center;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #2e8b57;
            border-radius: 10px;
            background-color: #fff;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #2e8b57;
        }
        select, button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #2e8b57;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #3cb371;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #2e8b57;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #2e8b57;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #d4e6d5;
        }
        p {
            margin: 20px 0;
            color: #2e8b57;
            text-align: center;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Laporan Bulanan</h1>

    <form method="GET" action="">
        <label for="bulan">Pilih Bulan:</label>
        <select name="bulan" id="bulan">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

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
        <button type="button" onclick="printPage()">Cetak Laporan</button>
    </form>

    <?php
    include 'database.php';

    if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $sql = "SELECT p.name, SUM(o.quantity) AS total_jumlah, SUM(o.quantity * p.price) AS total_harga 
                FROM orders o 
                JOIN products p ON o.product_id = p.id
                WHERE MONTH(o.tanggal) = $bulan AND YEAR(o.tanggal) = $tahun 
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
        } else {
            echo "<p>Tidak ada hasil untuk bulan dan tahun yang dipilih</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
