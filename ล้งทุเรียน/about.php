<?php 
    session_start();
    require_once 'config/db.php';
    
    // if(!isset($_SESSION['user_login'])){
    //     $_SESSION['error']='Please login';
    //     header('location: signin.php');
    // }
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
            /* background-image: url(https://www.chiangraifocus.com/wp-content/uploads/2023/08/%E0%B8%A7%E0%B8%B4%E0%B8%A7%E0%B8%AA%E0%B8%A7%E0%B8%A2%E0%B9%86_%E0%B8%AA%E0%B8%A7%E0%B8%99%E0%B8%97%E0%B8%B8%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%99%E0%B8%B2%E0%B8%87%E0%B8%99%E0%B8%AD%E0%B8%99-7.jpg);
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0; */
        }

        .navbar {
            background-color: #556B2F;
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
            background-color: #B8860B;
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
            font-size: 300%;
            color: #610c06;
            margin: 0;
        }

        .content p {
            font-size: 50px;
            margin: 20px 0;
        }

        .user-info {
            font-size: 10px;
            color: #000000;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px;
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
        }

        .content .logout-button:hover {
            background-color: #ff9671;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="duriantype.php" class="logo">DurianSA</a>
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="duriantype.php">DurianType</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="signin.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
       
      
        <div class="user-info">
            <p>Address: U-city, Thung Suk La, Si Racha District, Chon Buri 20230</p>
            <p>Phone: 096-693-0069</p>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.342631230909!2d100.92550120911147!3d13.11539581171433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2e9a50c75bbf5%3A0x7f89973d9d27a88!2s13.1153958%2C%20100.9255012!5e0!3m2!1sen!2sth!4v1697149874000!5m2!1sen!2sth" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
</body>
</html>
