<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - sport shop Online</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('assets/images/bg1.jpg'); /* Ganti path dengan lokasi gambar Anda */
            background-size: cover;
            background-position: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Menambahkan sedikit transparansi untuk kontainer login */
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            margin: 100px auto; /* Menengahkan kontainer login secara horizontal */
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="process_login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
