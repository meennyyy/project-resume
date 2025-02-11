<?php 
session_start();
require_once 'config/db.php';

// ตรวจสอบการล็อกอินของผู้ดูแลระบบ
// if (!isset($_SESSION['admin_login'])) {
//     $_SESSION['error'] = 'Please login';
//     header('location: signin.php');
//     exit();
// }

// ดึงข้อมูลผู้ใช้ที่ล็อกอิน
$admin_id = $_SESSION['admin_login'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :admin_id");
$stmt->execute(['admin_id' => $admin_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// ฟังก์ชันเพิ่มสินค้า
if (isset($_POST['add_product'])) {
    $type_id = $_POST['type_id'];
    $grade = $_POST['grade'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $vendors_id = $_POST['vendors_id']; // รับค่าจากฟอร์ม

    // ตรวจสอบให้แน่ใจว่าฟิลด์ทั้งหมดถูกกรอก
    if (empty($type_id) || empty($grade) || empty($qty) || empty($price) || empty($vendors_id)) {
        $_SESSION['error'] = 'All fields are required.';
    } else {
        // เพิ่มข้อมูลลงในตาราง Products
        $insert_stmt = $conn->prepare("INSERT INTO Products (type_id, grade, qty, price, vendors_id) VALUES (:type_id, :grade, :qty, :price, :vendors_id)");
        $insert_stmt->execute(['type_id' => $type_id, 'grade' => $grade, 'qty' => $qty, 'price' => $price, 'vendors_id' => $vendors_id]);
        $_SESSION['success'] = 'Product added successfully!';
    }
}

// ฟังก์ชันแก้ไขสินค้า
if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    // อัปเดตข้อมูลในตาราง Products
    $update_stmt = $conn->prepare("UPDATE Products SET qty = :qty, price = :price WHERE product_id = :product_id");
    $update_stmt->execute(['qty' => $qty, 'price' => $price, 'product_id' => $product_id]);
    $_SESSION['success'] = 'Product updated successfully!';
}

// ฟังก์ชันลบสินค้า
if (isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    // ลบข้อมูลจากตาราง Products
    $delete_stmt = $conn->prepare("DELETE FROM Products WHERE product_id = :product_id");
    $delete_stmt->execute(['product_id' => $product_id]);
    $_SESSION['success'] = 'Product deleted successfully!';
}

// ดึงข้อมูลประเภททุเรียน
$types_stmt = $conn->query("SELECT * FROM DurianTypes");
$durian_types = $types_stmt->fetchAll(PDO::FETCH_ASSOC);

// ดึงข้อมูลผู้จำหน่าย
$vendors_stmt = $conn->query("SELECT * FROM Vendors");
$vendors = $vendors_stmt->fetchAll(PDO::FETCH_ASSOC);

// ดึงข้อมูลสินค้า
$products_stmt = $conn->query("SELECT p.product_id, d.type_name, p.grade, p.qty, p.price, v.vendors_name 
                                FROM Products p 
                                JOIN DurianTypes d ON p.type_id = d.type_id
                                JOIN Vendors v ON p.vendors_id = v.vendors_id");
$products_stmt->execute();
$products = $products_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <!-- <h3 class="mt-4">Welcome Admin, <?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></h3> -->
    <a href="signin.php" class="btn btn-danger btn-sm">Logout</a>

    <h4 class="mt-5">Add Product</h4>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="type_id" class="form-label">Durian Type</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <?php foreach ($durian_types as $type): ?>
                    <option value="<?php echo $type['type_id']; ?>"><?php echo htmlspecialchars($type['type_name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <select class="form-control" id="grade" name="grade" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="vendors_id" class="form-label">Vendor</label>
            <select class="form-control" id="vendors_id" name="vendors_id" required>
                <?php foreach ($vendors as $vendor): ?>
                    <option value="<?php echo $vendor['vendors_id']; ?>"><?php echo htmlspecialchars($vendor['vendors_name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
    </form>

    <h4 class="mt-5">Products List</h4>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Type</th>
                <th>Grade</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Vendor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['product_id']); ?></td>
                    <td><?php echo htmlspecialchars($product['type_name']); ?></td>
                    <td><?php echo htmlspecialchars($product['grade']); ?></td>
                    <td><?php echo htmlspecialchars($product['qty']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td><?php echo htmlspecialchars($product['vendors_name']); ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="number" name="qty" placeholder="New quantity" required>
                            <input type="number" step="0.01" name="price" placeholder="New price" required>
                            <button type="submit" name="update_product" class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <button type="submit" name="delete_product" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
