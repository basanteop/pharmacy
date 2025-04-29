<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include 'db_connect.php';

$total_meds = $conn->query("SELECT COUNT(*) as count FROM medicines")->fetch_assoc()['count'];
$low_stock = $conn->query("SELECT COUNT(*) as count FROM medicines WHERE quantity < 10")->fetch_assoc()['count'];
$total_sales = $conn->query("SELECT SUM(total_price) as total FROM sales")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Pharmacy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Medicines</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_meds; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Low Stock</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $low_stock; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Sales (GH¢)</div>
                <div class="card-body">
                    <h5 class="card-title">GH¢ <?php echo number_format($total_sales, 2); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>