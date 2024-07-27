<!DOCTYPE html>
<html>
<head>
    <title>Menu Laporan</title>
    <style>
        /* Resetting some default styles */
        body, h1, ul, li {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5; /* Light grey background */
            color: #333; /* Dark text color for readability */
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
            height: 100vh;
            margin: 0;
            padding-top: 20px; /* Add some space from the top */
        }

        /* Container styling */
        .container {
            text-align: center;
            background: #ffffff; /* White background for the content area */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            max-width: 500px;
            width: 100%;
        }

        /* Styling the header */
        h1 {
            color: #4a148c; /* Deep purple color for the header */
            margin-bottom: 20px;
        }

        /* Styling the navigation */
        nav {
            margin-top: 20px;
        }

        /* Styling the list */
        ul {
            list-style-type: none;
            padding: 0;
        }

        /* Styling each list item */
        li {
            margin: 15px 0;
        }

        /* Styling the links */
        a {
            text-decoration: none;
            color: #ffffff; /* White color for text */
            background-color: #7b1fa2; /* Purple background color */
            padding: 15px 25px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        /* Adding hover effect for links */
        a:hover {
            background-color: #6a1b9a; /* Slightly darker purple for hover effect */
            transform: translateY(-2px); /* Slight lift effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menu Laporan</h1>
        <nav>
            <ul>
                <li><a href="laporan_harian.php">Laporan Harian</a></li>
                <li><a href="laporan_stok.php">Laporan Stok</a></li>
                <li><a href="laporan_bulanan.php">Laporan Bulanan</a></li>
                <li><a href="laporan_tahunan.php">Laporan Tahunan</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
