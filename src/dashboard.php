<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="d-flex">
       <!-- Include Sidebar -->
       <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fs-2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <div class="user-info d-flex align-items-center">
                    <span class="me-3">Rachel Foster</span>
                    <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-circle">
                </div>
            </header>

            <section class="stats row g-4">
                <div class="col-md-3">
                    <div class="stat-card bg-primary text-white p-4 rounded">
                        <h3><i class="fas fa-users"></i></h3>
                        <p>Total Users</p>
                        <h4 id="total-users">Loading.....</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-success text-white p-4 rounded">
                        <h3><i class="fas fa-store"></i></h3>
                        <p>Total Stores</p>
                        <h4>15,265</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-warning text-white p-4 rounded">
                        <h3><i class="fas fa-shopping-cart"></i></h3>
                        <p>Total Orders</p>
                        <h4>145,265</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-danger text-white p-4 rounded">
                        <h3><i class="fas fa-wallet"></i></h3>
                        <p>Total Revenue</p>
                        <h4>₹25,596,659</h4>
                    </div>
                </div>
            </section>

            <section class="chart mt-5">
                <h2 class="mb-4">Revenue</h2>
                <div class="bg-white p-4 rounded shadow-sm">
                    <canvas id="revenue-chart"></canvas>
                </div>
            </section>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>