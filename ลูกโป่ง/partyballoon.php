<?php 
    session_start();
    require_once 'config/db.php'; // เชื่อมต่อกับฐานข้อมูล
    if(!isset($_SESSION['user_login'])){
        $_SESSION['error'] = 'Please login to access this page';
        header('location: signin.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party Balloons - Bubble Burst</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('https://cdn.pixabay.com/photo/2017/05/07/08/56/balloon-2299781_960_720.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: #ff6f61;
            padding: 15px 20px;
            width: 100%;
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
            color: #333;
            font-size: 48px;
            margin-top: 30px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin-top: 30px;
        }

        .product-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
            padding: 20px;
            width: 250px;
            text-align: center;
        }

        .product-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-item h2 {
            font-size: 20px;
            margin: 15px 0;
            color: #ff6f61;
        }

        .product-item p {
            color: #666;
            margin-bottom: 10px;
        }

        .product-item .price {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .product-item button {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .product-item button:hover {
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

    <h1>Party Balloons</h1>

    <div class="product-container">
        <div class="product-item">
            <img src="https://example.com/party-balloon1.jpg" alt="Party Balloon 1">
            <h2>Party Balloon 1</h2>
            <p>Fun and Colorful Party Balloon</p>
            <div class="price">3000 Baht</div>
            <button class="add-to-cart" data-product="Party Balloon 1">Add to Cart</button>
        </div>

        <div class="product-item">
            <img src="https://example.com/party-balloon2.jpg" alt="Party Balloon 2">
            <h2>Party Balloon 2</h2>
            <p>Classic Party Balloon Set</p>
            <div class="price">3000 Baht</div>
            <button class="add-to-cart" data-product="Party Balloon 2">Add to Cart</button>
        </div>

        <div class="product-item">
            <img src="https://example.com/party-balloon3.jpg" alt="Party Balloon 3">
            <h2>Party Balloon 3</h2>
            <p>Festive Party Balloon</p>
            <div class="price">3000 Baht</div>
            <button class="add-to-cart" data-product="Party Balloon 3">Add to Cart</button>
        </div>
    </div>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const product = button.getAttribute('data-product');
                
                // ส่งข้อมูลสินค้าไปยังหน้า calculate.php
                window.location.href = "calculateparty.php?product=" + encodeURIComponent(product);
            });
        });
    </script>

</body>
</html>
