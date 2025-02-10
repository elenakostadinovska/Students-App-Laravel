<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
         body {
            font: 14px sans-serif;
            text-align: center;
        }

        h1, p {
            text-align: center;
        }

        h1.my-5 {
            color: #0c5797;
        }

        .cards-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-bottom: 60px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            width: 400px;
            height: 150px;
            text-align: center;
            padding: 20px;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            position: relative;
            color: #f8f9fa;
        }

        .card h2::after {
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            background-color: white;
            margin: 8px auto 0;
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            color: white;
        }

        .card.students {
            background-color: #5CAFE8;
        }

        .card.universities {
            background-color: #2484c4;
        }

        .card.courses {
            background-color: #0c5797;
        }

        .card i {
            font-size: 2rem;
            color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        p a.btn-primary {
            color: white;
            background-color: #0c5797;
            border-color: #0c5797;
            font-size: 20px;
            font-weight: 500;
            padding: 10px 15px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        p a.btn-warning {
            color: #0c5797;
            background-color: #ADD8E6;
            border-color: #ADD8E6;
            font-size: 20px;
            font-weight: 500;
            padding: 10px 15px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        p a.btn-warning:hover {
            background-color: #2484c4;
            border-color: #2484c4;
            color: white;
        }

        p a.btn-primary:hover {
            background-color: #2484c4;
            border-color: #2484c4;
        }

        h1.dashboard-title {
            color: #0c5797 !important;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <h1 class="dashboard-title">Dashboard</h1>
    <div class="cards-container">
        <div class="card students">
            <i class="bi bi-people"></i>
            <h2>Students</h2>
            <p>Total Students</p>
            <p>{{ $studentsCount }}</p> <!-- Display student count -->
        </div>

        <div class="card universities">
            <i class="bi bi-building"></i>
            <h2>Universities</h2>
            <p>Total Universities</p>
            <p>{{ $universitiesCount }}</p> <!-- Display university count -->
        </div>

        <div class="card courses">
            <i class="bi bi-book"></i>
            <h2>Courses</h2>
            <p>Total Courses</p>
            <p>25</p>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
