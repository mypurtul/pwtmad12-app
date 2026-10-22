<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIAKAD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 30px;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 60px);
        }

        .sidebar {
            width: 220px;
            background: white;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            text-decoration: none;
            color: #333;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #eef2ff;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: linear-gradient(135deg, #006994, #00a6c7);
            padding: 25px;
            border-radius: 16px;
            flex: 1;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 25px rgba(0, 105, 148, 0.25);
            transition: all 0.3s ease;
        }   

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0, 105, 148, 0.35);
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #eef2ff;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #162d6b;
        }

        .btn-warning { background: #f59e0b; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-secondary { background: #6b7280; color: white; }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container {
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        /* Filter Box Khusus P6 */
        .filter-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .filter-item {
            flex: 1;
            min-width: 150px;
        }

        .filter-item label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .filter-item input, .filter-item select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <div class="container">

        @include('components.sidebar')

        <main class="content">
            @yield('content')
        </main>

    </div>

</body>
</html>