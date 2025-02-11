<?php 
session_start();
// ตรวจสอบการล็อกอิน
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login to access this page';
    header('location: signin.php');
    exit();
}

// ดึงค่าจาก query string
$name = isset($_GET['name']) ? $_GET['name'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$total = isset($_GET['total']) ? $_GET['total'] : '0.00';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary - Bubble Burst</title>
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

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 36px;
            color: #333;
        }

        .summary-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .summary-item {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }

        .back-btn, .payment-btn {
            display: block;
            margin: 20px auto;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
            text-align: center;
            text-decoration: none;
        }

        .back-btn:hover, .payment-btn:hover {
            background-color: #ff5746;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">Bubble Burst</a>
    </nav>

    <h1>Order Summary</h1>

    <div class="summary-container">
        <div class="summary-item" id="name">Name: <?php echo htmlspecialchars($name); ?></div>
        <div class="summary-item" id="address">Address: <?php echo htmlspecialchars($address); ?></div>
        <div class="summary-item" id="phone">Phone: <?php echo htmlspecialchars($phone); ?></div>
        <div class="summary-item" id="total">Total Amount: <?php echo htmlspecialchars($total); ?> Baht</div>

        <a href="payment.php?name=<?php echo urlencode($name); ?>&address=<?php echo urlencode($address); ?>&phone=<?php echo urlencode($phone); ?>&total=<?php echo urlencode($total); ?>" class="payment-btn" id="paymentBtn">Pay Now</a>
        <a href="user.php" class="back-btn">Back to Home</a>
    </div>

</body>
</html>
