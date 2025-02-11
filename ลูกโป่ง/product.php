<?php 
    session_start();
    require_once 'config/db.php'; 
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
    <title>Products - Bubble Burst</title>
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

        .product-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .category-item {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .category-item:hover {
            transform: scale(1.05);
        }

        .category-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .category-item h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .category-item a {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .category-item a:hover {
            background-color: #ff9671;
        }

        h1 {
            text-align: center;
            margin: 40px 0;
            color: #610c06;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">Bubble Burst</a>
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h1>Select a Product Category</h1>

    <div class="product-categories">
      
        <div class="category-item">
            <img src="https://www.mangopeopleshop.com/cdn/shop/products/set-of-13-letters-rose-gold-happy-birthday-balloons-party-supplies-357_1200x1200.jpg?v=1655202335" alt="Happy Birthday Balloons">
            <h2>Happy Birthday</h2>
            <a href="hbdproduct.php">Shop Now</a>
        </div>

        <div class="category-item">
            <img src="https://www.hippoballoon.com/img/products/96a3bec1f9cdef69a2950a4e4df6e53e.jpg" alt="Congratulations Balloons">
            <h2>Congratulations</h2>
            <a href="congratulations.php">Shop Now</a>
        </div>

        <div class="category-item">
            <img src="https://m.media-amazon.com/images/I/61VNA9D4lsL._AC_UF1000,1000_QL80_.jpg" alt="Party Balloons">
            <h2>Party Balloon</h2>
            <a href="partyballoon.php">Shop Now</a>
        </div>
    </div>

</body>
</html>
