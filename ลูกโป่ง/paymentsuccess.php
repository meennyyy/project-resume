<?php 
    session_start();
    require_once 'config/db.php';
    if(!isset($_SESSION['user_login'])){
        $_SESSION['error']='Please login';
        header('location: signin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page - Bubble Burst</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-image: url(https://jinpiin.com/wp-content/webp-express/webp-images/uploads/2021/12/balloon-decoration.jpg.webp);
            background-size: cover;
            background-position: center;
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
            font-size: 400%;
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
            font-size: 30px;
            padding: 8px 12px;
            transition: background 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #ff9671;
            border-radius: 4px;
            color: white;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
            color: #000000;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }

        .content h1 {
            font-size: 800%;
            color: #610c06;
            margin: 0;
        }

        .content p {
            font-size: 50px;
            margin: 20px 0;
        }

        .user-info {
            font-size: 30px;
            color: #000000;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .content .logout-button {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .content .logout-button:hover {
            background-color: #ff9671;
        }


        .content .back-button {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .content .back-button:hover {
            background-color: #ff9671;
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

    <div class="content">
        <?php 
            if(isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <h1>Thank you!</h1>
        <div class="user-info">
            <p>Thank you for pruchasing products from the shop.</p>
        </div>
        <button class="back-button" onclick="window.location.href='user.php'">Back to home</button> 
        <button class="logout-button" onclick="window.location.href='logout.php'">Logout</button>
    </div>

</body>
</html>