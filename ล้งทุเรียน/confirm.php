<?php 
session_start();

// ตรวจสอบการล็อกอิน
// if(!isset($_SESSION['user_login'])){
//     $_SESSION['error'] = 'Please login';
//     header('location: signin.php');
//     exit();
// }

// รับข้อมูลจากฟอร์ม
$firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
$lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
$address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$total = isset($_POST['total']) ? htmlspecialchars($_POST['total']) : '0.00';
$total_quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '0'; // ตรวจสอบการส่ง

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Durian</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure full viewport height */
        }

        .navbar {
            background-color: #556B2F;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 32px; /* Adjusted logo size */
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
            margin-left: 40px; /* Adjusted margin */
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 20px; /* Adjusted font size */
            padding: 4px 12px;
            transition: background 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #B8860B;
            border-radius: 4px;
            color: white;
        }

        .content {
            padding: 50px 20px; /* Adjusted padding */
            text-align: center;
            flex: 1; /* Allow content to grow */
        }

        .content h1 {
            font-size: 36px; /* Adjusted heading size */
            color: #610c06;
            margin-bottom: 20px;
        }

        .confirm-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Adjusted padding */
            margin: 20px auto; /* Center container */
            max-width: 600px; /* Max width for better readability */
        }

        .confirm-container p {
            font-size: 18px; /* Adjusted paragraph size */
            margin: 10px 0; /* Adjusted margin */
        }

        .confirm-container strong {
            color: #556B2F; /* Different color for labels */
        }

        .back-btn {
            background-color: #556B2F;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px; /* Adjusted button font size */
            border-radius: 5px; /* Adjusted border radius */
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 20px; /* Spacing above button */
        }

        .back-btn:hover {
            background-color: #B8860B;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: auto; /* Push footer to the bottom */
        }

        .footer h2 {
            font-size: 24px;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .footer p, .footer a {
            font-size: 18px;
            color: #cccccc;
            margin: 5px 0;
            text-decoration: none;
        }

        .footer a:hover {
            color: #B8860B;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">DurianSA</a>
        <ul>
            <li><a href="durianhome.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="signin.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>Order Confirmation</h1>

        <div class="confirm-container">
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($firstname); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lastname); ?></p>
            <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($address); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone); ?></p>
            <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($total); ?> Baht</p>
            <p><strong>Total Quantity:</strong> <?php echo htmlspecialchars($total_quantity); ?></p>

            <form action="duriantype.php">
                <button type="submit" class="back-btn">Confirm order</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <h2>Thank you for your order!</h2>
        <p>&copy; 2024 DurianSA. All rights reserved.</p>
    </div>

</body>