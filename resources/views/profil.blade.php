<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 700px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .data {
            margin-top: 25px;
        }

        .row {
            display: flex;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            width: 150px;
            font-weight: bold;
        }

        .value {
            flex: 1;
        }

        .menu {
            text-align: center;
            margin-top: 25px;
        }

        .menu a {
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px 18px;
            margin: 5px;
            border-radius: 5px;
        }

        .menu a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Profil Mahasiswa</h1>

        <div class="data">

            <div class="row">
                <div class="label">Nama</div>
                <div class="value">{{ $nama }}</div>
            </div>

            <div class="row">
                <div class="label">NIM</div>
                <div class="value">{{ $nim }}</div>
            </div>

            <div class="row">
                <div class="label">Email</div>
                <div class="value">{{ $email }}</div>
            </div>

            <div class="row">
                <div class="label">No. HP</div>
                <div class="value">{{ $no_hp }}</div>
            </div>

        </div>

        <div class="menu">
            <a href="/profil">Profil</a>
            <a href="/pendidikan">Pendidikan</a>
        </div>

    </div>

</body>
</html>