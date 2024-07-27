<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
			background-image: url('assets/images/bg1.jpg'); /* Ganti dengan path gambar latar belakang futuristik */
			background-size: cover;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color:	#d3d3d3;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kontak Kami</h1>
        <form action="#">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama anda" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
            
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" placeholder="Tulis pesan anda disini" required></textarea>
            
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
