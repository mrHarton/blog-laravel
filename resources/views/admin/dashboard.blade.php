<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxv4B6rIri8v0EJ7G5e7JWgi6Gp5U5MQ0GcXkvIo99r0vVpgeLVr0J0o5oC" crossorigin="anonymous">

    <!-- Custom CSS (optional) -->
    <style>
        .admin-dashboard {
            padding-top: 50px;
        }
        .admin-card {
            margin: 10px;
        }
    </style>
</head>
<body>

    <div class="container admin-dashboard">
        <h1>Welcome to the Admin Dashboard</h1>

        <!-- Admin Overview Section -->
        <div class="row">
            <div class="col-md-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text">15</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">30</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Active Comments</h5>
                        <p class="card-text">75</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="mt-4">
            <h3>Recent Activity</h3>
            <ul class="list-group">
                <li class="list-group-item">Post "Introduction to Laravel" was published.</li>
                <li class="list-group-item">User "John Doe" commented on "How to Build a Laravel App".</li>
                <li class="list-group-item">Post "Laravel Authentication" was edited.</li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-qQdBt1dmu24kl2qkq1zIkpRYVm6VwRIu8rZTltTEzv6UmsNlAWiHly0PVf7FeHpE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0u6Y4VfW9cP5JSTv6fB50u5Qonmjth40yAOv6roUpgg69p+e" crossorigin="anonymous"></script>
</body>
</html>