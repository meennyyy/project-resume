<?php 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page - DurianSA</title>
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
            background: url('https://www.chiangraifocus.com/wp-content/uploads/2023/08/%E0%B8%A7%E0%B8%B4%E0%B8%A7%E0%B8%AA%E0%B8%A7%E0%B8%A2%E0%B9%86_%E0%B8%AA%E0%B8%A7%E0%B8%99%E0%B8%97%E0%B8%B8%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%99%E0%B8%B2%E0%B8%87%E0%B8%99%E0%B8%AD%E0%B8%99-7.jpg') no-repeat center center fixed;
            background-size: cover;
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
            margin-left: 70px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 40px;
            padding: 4px 12px;
            transition: background 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #B8860B;
            border-radius: 4px;
            color: white;
        }

        .content {
            padding: 100px;
            text-align: center;
            flex: 1; /* Allow content to grow */
        }

        .content h1 {
            font-size: 50px;
            color: #610c06;
            margin-bottom: 20px;
        }

        .durian-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 100px;
        }

        .durian-item {
            flex: 0 0 20%; /* Four items in a row (100% / 4 = 25% - margin for gaps) */
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 25px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .durian-item:hover {
            transform: scale(1.05);
        }

        .durian-item img {
            width: 100%;
            height: ต0px;
            object-fit: cover;
        }

        .durian-item .details {
            padding: 100px;
            text-align: center;
        }

        .durian-item h2 {
            font-size: 50px;
            color: #610c06;
            margin: 0;
        }

        .durian-item p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }

        .durian-item .weight-grade {
            font-size: 16px;
            color: #777;
        }

        .durian-item .view-more {
            background-color: #556B2F;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background 1.3s;
            text-decoration: none;
            margin-top: 10px; /* Added margin-top */
        }

        .durian-item .view-more:hover {
            background-color: #B8860B;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 8
			;
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
            margin: 5px 100;
            text-decoration: none;
        }

        .footer a:hover {
            color: #B8860B;
        }

    </style>
</head>
<body>

<nav class="navbar">
        <a href="durianhome.php" class="logo">DurianSA</a>
        <ul>
            <li><a href="durianhome.php">HOME</a></li>
            <li><a href="duriantype.php">DurianType</a></li>
            <li><a href="about.php">Aboutus</a></li>
            <li><a href="signin.php">Logout</a></li>
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
        <h1>Welcome!</h1>
        <h1>Durian SA</h1>
        <!-- <div class="user-info">
            <p>Hi, <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
        </div>
        <button class="logout-button" onclick="window.location.href='logout.php'">Logout</button>
    </div> -->

</body>
</html>