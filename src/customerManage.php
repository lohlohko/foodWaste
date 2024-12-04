<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<div class="d-flex">
<?php include 'sidebar.php'; ?>
<main>
<div class="container my-5">
<!-- Button for Add New Customer -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Customer Management</h2>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
        <i class="fas fa-user-plus"></i> Add New Customer
    </button>
</div> 
<!-- Modal Add -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../includes/addUser.php" method="POST">
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="customer-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="customer-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="customer-email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" id="edit-user-id" name="id">
                    <div class="mb-3">
                        <label for="edit-user-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-user-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="edit-user-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-user-email" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEditUserBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Customer List</h5>
            <div>
                <input type="text" class="form-control d-inline-block w-auto" placeholder="Search...">
            </div>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th><input type="checkbox"></th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="user-list">
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-3">
            <span>Total: <a id="total-users">0</a> Customers </span>
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</main>
</div>


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>
</html>
