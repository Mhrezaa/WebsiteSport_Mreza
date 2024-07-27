<!DOCTYPE html>
<html>
<head>
    <title>Laporan Harian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
            font-weight: bold;
        }

        input[type="date"] {
            padding: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        .print-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Harian</h1>

        <form method="GET" action="">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>
            <button type="submit">Tampilkan Laporan</button>
        </form>

        <?php
        include 'database.php';

        if (isset($_GET['tanggal'])) {
            $tanggal = $_GET['tanggal'];

            $sql = "SELECT o.order_id, o.product_id, o.user_id, u.username, o.total_price, o.tanggal 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.id 
                    WHERE DATE(o.tanggal) = '$tanggal'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Price</th>
                            <th>Tanggal</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["order_id"] . "</td>
                            <td>" . $row["product_id"] . "</td>
                            <td>" . $row["user_id"] . "</td>
                            <td>" . $row["username"] . "</td>
                            <td>" . number_format($row["total_price"], 2, ',', '.') . "</td>
                            <td>" . date("d-m-Y", strtotime($row["tanggal"])) . "</td>
                          </tr>";
                }
                echo "</table>";
                echo "<div class='print-button'>
                        <button onclick='window.print()'>Cetak Laporan</button>
                      </div>";
            } else {
                echo "<p>Tidak ada hasil untuk tanggal yang dipilih</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
