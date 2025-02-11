<?php 
session_start();
// ตรวจสอบการล็อกอิน
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login to access this page';
    header('location: signin.php');
    exit();
}

// ดึงค่ารวมจาก query string
$total = isset($_GET['total']) ? $_GET['total'] : '0.00';
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
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"], input[type="tel"], textarea {
            width: 95%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        textarea {
            height: 100px;
        }

        .total-amount {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .submit-btn {
            background-color: #ff6f61;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background-color: #ff5746;
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">Bubble Burst</a>
        <ul>
            <li><a href="bubblepage.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h1>Customer Information</h1>

    <div class="form-container">
        <div class="total-amount" id="totalAmount">Total Amount: <?php echo htmlspecialchars($total); ?> Baht</div>
        
        <form action="summary.php" method="GET" onsubmit="return setFormValues();">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" placeholder="Enter your delivery address" required></textarea>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

            <input type="hidden" id="hiddenTotal" name="total" value="<?php echo htmlspecialchars($total); ?>">

            <button type="submit" class="submit-btn">Submit Order</button>
        </form>
    </div>

    <script>
        function setFormValues() {
            const name = document.getElementById('name').value;
            const address = document.getElementById('address').value;
            const phone = document.getElementById('phone').value;
            const total = document.getElementById('hiddenTotal').value;

            // เปลี่ยนเส้นทางไปยังหน้า summary.php พร้อมส่งข้อมูล
            window.location.href = `summary.php?name=${encodeURIComponent(name)}&address=${encodeURIComponent(address)}&phone=${encodeURIComponent(phone)}&total=${total}`;
            return false; 
        }
    </script>

</body>
</html>
