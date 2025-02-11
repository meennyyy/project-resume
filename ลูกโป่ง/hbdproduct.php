<?php 
    session_start();
    require_once 'config/db.php'; // เรียกใช้การเชื่อมต่อฐานข้อมูล
    if(!isset($_SESSION['user_login'])){
        $_SESSION['error'] = 'Please login';
        header('location: signin.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday Balloons - Bubble Burst</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
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
            font-size: 28px;
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
            color: white;
        }

        h1 {
            text-align: center;
            margin: 40px 0;
            color: #610c06;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-item {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: scale(1.05);
        }

        .product-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-item h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .product-item p {
            color: #777;
            margin-bottom: 15px;
        }

        .product-item .price {
            font-size: 18px;
            color: #ff6f61;
            margin-bottom: 15px;
        }

        .product-item button {
            padding: 10px 20px;
            background-color: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .product-item button:hover {
            background-color: #ff9671;
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

    <h1>Happy Birthday Balloons</h1>

    <div class="product-container">
        <div class="product-item">
            <img src="https://b2409010.smushcdn.com/2409010/wp-content/uploads/2019/03/FUnlah-balloon-package-Mega-pink-1.jpg?lossy=1&strip=1&webp=0" alt="Birthday Balloon 1"> 
            <h2>Birthday Balloon 1</h2>
            <p>Beautiful Happy Birthday Balloon</p>
            <div class="price">3000 Baht</div>
            <button onclick="window.location.href='calculate.php'">Add to Cart</button> 
        </div>

        <div class="product-item">
            <img src="https://specialyou.in/cdn/shop/files/71D2IeD0T_L._SL1500.jpg?v=1690193826&width=2048" alt="Birthday Balloon 2">
            <h2>Birthday Balloon 2</h2>
            <p>Colorful Birthday Balloon</p>
            <div class="price">3000 Baht</div>
            <button onclick="window.location.href='calculate.php'">Add to Cart</button>
        </div>

        <div class="product-item">
            <img src="https://i0.wp.com/retailonline.in/wp-content/uploads/2022/09/g3_11zon.jpg?fit=960%2C960&ssl=1" alt="Birthday Balloon 3">
            <h2>Birthday Balloon 3</h2>
            <p>Elegant Birthday Balloon</p>
            <div class="price">3000 Baht</div>
            <button onclick="window.location.href='calculate.php'">Add to Cart</button>
        </div>
    </div>

</body>
</html>
