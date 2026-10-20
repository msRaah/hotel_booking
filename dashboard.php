<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking Admin</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <span class="navbar-brand">Hotel Booking System</span>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="dashboard.php" class="brand-link">
            <span class="brand-text font-weight-light">Hotel Admin</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../quarter.php" class="nav-link">
                            <i class="nav-icon fas fa-bed"></i>
                            <p>Rooms</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper p-4">
         <?php
    require_once '../db.php';

    $guests = $conn->query("SELECT COUNT(*) AS total FROM guests")->fetch_assoc()['total'];
    $bookings = $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()['total'];
    $payments = $conn->query("SELECT COALESCE(SUM(amount),0) AS total FROM payments WHERE payment_status='Paid'")->fetch_assoc()['total'];
    ?>

    <h1>Hotel Luxury</h1>
    <p>Welcome to your hotel management system.</p>

    

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $guests ?></h3>
                    <p>Total Guests</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $bookings ?></h3>
                    <p>Total Bookings</p>
                </div>
                <div class="icon"><i class="fas fa-calendar-check"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= number_format((float)$payments, 2) ?></h3>
                    <p>Total Paid</p>
                </div>
                <div class="icon"><i class="fas fa-money-bill"></i></div>
            </div>
        </div>
    </div>
</div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>