<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendidikan Mahasiswa</title>

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

        .pendidikan {
            margin-top: 25px;
        }

        .item {
            padding: 18px;
            margin-bottom: 15px;
            background-color: #f8f8f8;
            border-left: 5px solid #333;
        }

        .item h3 {
            margin: 0 0 8px 0;
            color: #333;
        }

        .item p {
            margin: 0;
            color: #555;
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

        <h1>Riwayat Pendidikan</h1>

        <div class="pendidikan">

            <div class="item">
                <h3>SD</h3>
                <p>{{ $sd }}</p>
            </div>

            <div class="item">
                <h3>SMP</h3>
                <p>{{ $smp }}</p>
            </div>

            <div class="item">
                <h3>SMA</h3>
                <p>{{ $sma }}</p>
            </div>

        </div>

        <div class="menu">
            <a href="/profil">Profil</a>
            <a href="/pendidikan">Pendidikan</a>
        </div>

    </div>

</body>
</html>