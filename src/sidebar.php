<!-- sidebar.php -->
<aside class="sidebar bg-dark text-white d-flex flex-column justify-content-between p-3" style="width: 250px;">
    <div>
        <div class="logo text-center mb-4">
            <h2><i class="fas fa-leaf"></i> FoodWaste</h2>
        </div>
        <nav class="menu">
            <ul class="list-unstyled">
                <li class="mb-3"><a href="dashboard.php" class="text-white text-decoration-none"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                <li class="mb-3"><a href="storeManage.php" class="text-white text-decoration-none"><i class="fas fa-cogs me-2"></i> Store Settings</a></li>
                <li class="mb-3"><a href="customerManage.php" class="text-white text-decoration-none"><i class="fas fa-users me-2"></i> Customer Management</a></li>
                <li class="mb-3"><a href="orderManage.php" class="text-white text-decoration-none"><i class="fas fa-shopping-cart me-2"></i> Order Management</a></li>
                <li class="mb-3"><a href="finance.php" class="text-white text-decoration-none"><i class="fas fa-wallet me-2"></i> Account & Finance</a></li>
            </ul>
        </nav>
    </div>
    <div class="logout text-center">
    <a href="../includes/auth.php?logout" onclick="return confirm('Are you sure logout?');" class="btn btn-danger w-100">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>
</aside>
