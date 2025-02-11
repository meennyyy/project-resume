<?php 
session_start();
require_once 'config/db.php';

// ตรวจสอบการล็อกอินของผู้ดูแลระบบ
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'Please login';
    header('location: signin.php');
    exit();
}

$admin_id = $_SESSION['admin_login'];
$stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// ฟังก์ชันเพิ่มสต็อก
if (isset($_POST['add_stock'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price']; // เพิ่มการรับค่า price จากฟอร์ม

    // เพิ่มข้อมูล product พร้อม stock และ price
    $insert_stmt = $conn->prepare("INSERT INTO products (name, stock, price) VALUES (:name, :stock, :price)");
    $insert_stmt->execute(['name' => $product_name, 'stock' => $quantity, 'price' => $price]); // เพิ่ม price ลงในคำสั่ง SQL
    $_SESSION['success'] = 'Product added successfully!';
}

// ฟังก์ชันแก้ไขสต็อก
if (isset($_POST['update_stock'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price']; // เพิ่มการรับค่า price จากฟอร์ม

    // อัปเดตข้อมูล stock และ price
    $update_stmt = $conn->prepare("UPDATE products SET stock = :stock, price = :price WHERE id = :id");
    $update_stmt->execute(['stock' => $quantity, 'price' => $price, 'id' => $product_id]); // อัปเดตทั้ง stock และ price
    $_SESSION['success'] = 'Stock and price updated successfully!';
}

if (isset($_POST['delete_stock'])) {
    $product_id = $_POST['product_id'];

    $delete_stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
    $delete_stmt->execute(['id' => $product_id]);
    $_SESSION['success'] = 'Product deleted successfully!';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h3, h4 {
            color: #343a40;
        }
        .container {
            margin-top: 20px;
        }
        .btn-primary, .btn-warning, .btn-danger {
            width: 100%;
        }
        .btn-small {
            padding: 5px 10px; /* ปรับขนาด padding ตามต้องการ */
            font-size: 14px; /* ปรับขนาดฟอนต์ */
        }
        .form-control {
            margin-bottom: 15px;
        }
        .table {
            margin-top: 20px;
            background-color: white;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mt-4">Welcome Admin, <?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></h3>
        <a href="logout.php" class="btn btn-danger btn-small">Logout</a>

        <!-- Form สำหรับเพิ่มสินค้า -->
        <h4 class="mt-5">Add Product</h4>
        <form method="POST">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" name="add_stock" class="btn btn-primary">Add Product</button>
        </form>

        <h4 class="mt-5">Products List</h4>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $products_stmt = $conn->query("SELECT * FROM products");
        $products_stmt->execute();
        $products = $products_stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><?php echo htmlspecialchars($product['stock']); ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                        <input type="number" name="quantity" placeholder="New stock" required>
                        <button type="submit" name="update_stock" class="btn btn-warning btn-small">Update</button>
                    </form>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="delete_stock" class="btn btn-danger btn-small">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        <!-- Form สำหรับแก้ไขสินค้า -->
        <h4 class="mt-5">Update Product Stock</h4>
<form method="POST">
    <div class="mb-3">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="number" class="form-control" id="product_id" name="product_id" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">New Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" required> <!-- เพิ่มฟิลด์สำหรับแก้ไขราคา -->
    </div>
    <button type="submit" name="update_stock" class="btn btn-warning">Update Stock</button>
</form>

  

      
        
    </div>
</body>
</html>
