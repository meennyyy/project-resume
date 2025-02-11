<?php 
session_start();
require_once 'config/db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบการล็อกอิน
// if(!isset($_SESSION['user_login'])){
//     $_SESSION['error'] = 'Please login';
//     header('location: signin.php');
//     exit();
// }

$customer_id = $_SESSION['user_login']; // ดึง customer_id จาก session

// ดึงข้อมูลลูกค้าจากฐานข้อมูล
$query = $conn->prepare("SELECT firstname, lastname, address, tel FROM customers WHERE customer_id = ?");
$query->execute([$customer_id]);
$customer = $query->fetch(PDO::FETCH_ASSOC);

// ดึงค่ารวมและ total quantity จาก query string
$total = isset($_GET['total']) ? $_GET['total'] : '0.00';
$total_quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '0'; // รับ total quantity
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information - Bubble Burst</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 0;
}

.navbar {
    background-color: #ff6f61;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.navbar .logo {
    font-size: 32px;
    font-weight: bold;
    color: white;
    text-decoration: none;
}

.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar ul li {
    margin-left: 20px;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 12px;
    transition: background 0.3s, color 0.3s;
}

.navbar ul li a:hover {
    background-color: #ff9671;
    border-radius: 4px;
}

h1 {
    text-align: center;
    margin-top: 20px;
    font-size: 36px;
    color: #333;
}

.form-container {
    max-width: 800px; /* จำกัดความกว้างของฟอร์ม */
    margin: 30px auto; /* จัดกลางฟอร์ม */
    padding: 20px; /* ขอบ padding */
    background-color: white; /* สีพื้นหลัง */
    border-radius: 8px; /* มุมโค้ง */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เงา */
}

label {
    display: block; /* ให้ label มีการแสดงผลแบบบล็อก */
    margin-top: 15px; /* ขอบด้านบน */
    font-weight: bold; /* ตัวหนา */
}

input[type="text"],
input[type="tel"],
textarea {
    width: 100%; /* ทำให้ช่อง input เต็มความกว้าง */
    padding: 10px; /* เพิ่ม padding */
    margin-top: 5px; /* ขอบด้านบน */
    border: 1px solid #ddd; /* สีกรอบ */
    border-radius: 4px; /* มุมโค้ง */
}

input[type="text"]:focus,
input[type="tel"]:focus,
textarea:focus {
    border-color: #ff6f61; /* เปลี่ยนสีกรอบเมื่อโฟกัส */
    outline: none; /* เอา outline ออก */
}

textarea {
    height: 100px; /* สูงสำหรับ textarea */
    resize: none; /* ไม่ให้สามารถปรับขนาดได้ */
}

.submit-btn {
    background-color: #ff6f61; /* สีพื้นหลังของปุ่ม */
    color: white; /* สีตัวอักษร */
    padding: 15px 30px; /* ขอบ padding */
    border: none; /* ไม่มีกรอบ */
    border-radius: 5px; /* มุมโค้ง */
    font-size: 18px; /* ขนาดตัวอักษร */
    cursor: pointer; /* แสดง cursor เป็นมือ */
    transition: background 0.3s; /* เปลี่ยนสีพื้นหลังเมื่อ hover */
    margin-top: 20px; /* ขอบด้านบน */
}

.submit-btn:hover {
    background-color: #ff5746; /* สีพื้นหลังเมื่อ hover */
}

.total-amount,
.total-quantity {
    font-size: 20px; /* ขนาดตัวอักษร */
    margin-top: 10px; /* ขอบด้านบน */
    font-weight: bold; /* ตัวหนา */
    color: #333; /* สีตัวอักษร */
}

        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #ff6f61;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar .logo {
            font-size: 32px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin-left: 20px;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 12px;
            transition: background 0.3s, color 0.3s;
        }
        .navbar ul li a:hover {
            background-color: #ff9671;
            border-radius: 4px;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 36px;
            color: #333;
        }
        .cart-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ff6f61;
            color: white;
        }
        .total-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .total-container h2 {
            margin-right: 20px;
        }
        .checkout-btn {
            background-color: #ff6f61;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .checkout-btn:hover {
            background-color: #ff5746;
        }
        .quantity-input {
            width: 60px;
            padding: 5px;
        }
        .add-to-cart-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-to-cart-btn:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">DurianSA</a>
        <ul>
            <li><a href="durianhome.php">Home</a></li>
            <li><a href="duriantype.php">DurianType</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="signin.php">Logout</a></li>
        </ul>
    </nav>

    <h1>Customer Information</h1>

    <div class="form-container">
        <div class="total-amount" id="totalAmount">Total Amount: <?php echo htmlspecialchars($total); ?> Baht</div>
        <div class="total-quantity" id="totalQuantity">Total Quantity: <?php echo htmlspecialchars($total_quantity); ?></div> <!-- แสดง total quantity -->

        <form action="confirm.php" method="POST"> <!-- เปลี่ยน action เป็น confirm.php -->
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" 
        value="<?php echo htmlspecialchars($customer['firstname'] ?? ''); ?>" required>

    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname" 
        value="<?php echo htmlspecialchars($customer['lastname'] ?? ''); ?>" required>

    <label for="address">Delivery Address</label>
    <textarea id="address" name="address" required><?php echo htmlspecialchars($customer['address'] ?? ''); ?></textarea>

    <label for="phone">Phone Number</label>
    <input type="tel" id="phone" name="phone" 
        value="<?php echo htmlspecialchars($customer['tel'] ?? ''); ?>" required>

    <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">
    <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($total_quantity); ?>"> <!-- เพิ่ม input hidden นี้ -->

    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>">

    <button type="submit" class="submit-btn">Submit Order</button>
</form>
    </div>

</body>
</html>
