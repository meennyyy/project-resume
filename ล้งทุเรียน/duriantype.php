<?php 
    session_start();
    require_once 'config/db.php';
    // if(!isset($_SESSION['user_login'])){
    //     $_SESSION['error'] = 'Please login';
    //     header('location: signin.php');
    //     exit();
    // }
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durian Store - DurianSA</title>
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
        <h1>ทุเรียนที่เราคัดสรร</h1>

        <div class="durian-container">
            <!-- Durian Cards -->
            <div class="durian-item">
                <img src="https://files.agrinewsthai.com/2022/07/E2588EA6-AEB0-4D8B-B3E2-A210C59AA93D.jpeg" alt="Monthong">
                <div class="details">
                    <h2>หมอนทอง</h2>
                    <p>ทุเรียนหมอนทอง</p>
                    <p class="weight-grade">น้ำหนัก: 3-4 kg | เกรด: A</p>
                    <a href="product.php?name=Monthong" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://files.agrinewsthai.com/2022/04/ED7E30B3-DCF4-4614-8874-E1B4C5A261A8.jpeg" alt="Chanee">
                <div class="details">
                    <h2>ชะนี</h2>
                    <p>ทุเรียนชะนี</p>
                    <p class="weight-grade">น้ำหนัก: 2.5-3 kg | เกรด: A</p>
                    <a href="product.php?name=Monthong" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://media.gosmartfarmer.com/2022/05/28163114/Web-Gosmartfarmer-1080x570-1.png" alt="Kradum">
                <div class="details">
                    <h2>กระดุม</h2>
                    <p>ทุเรียนกระดุม</p>
                    <p class="weight-grade">น้ำหนัก: 1.5-2 kg | เกรด: B</p>
                    <a href="product.php?name=Kradum" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://www.thaitechno.net/uploadedimages/c1/Product_45911_184190456_fullsize.jpg" alt="Kanyao">
                <div class="details">
                    <h2>ก้านยาว</h2>
                    <p>ทุเรียนก้านยาว</p>
                    <p class="weight-grade">น้ำหนัก: 3-3.5 kg | เกรด: A</p>
                    <a href="product.php?name=Kanyao" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQEktTibeczNNp5z0Wd0Bfxks3V134AIYccQ&s" alt="Puangmanee">
                <div class="details">
                    <h2>พวงมณี</h2>
                    <p>ทุเรียนพวงมณี</p>
                    <p class="weight-grade">น้ำหนัก: 2-2.5 kg | เกรด: B</p>
                    <a href="product.php?name=Puangmanee" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://blog.hungryhub.com/wp-content/uploads/2022/05/%E0%B8%97%E0%B8%B8%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%87%E0%B8%A5%E0%B8%B1%E0%B8%9A%E0%B9%81%E0%B8%A5-1-1024x683.webp" alt="Long Lap Lae">
                <div class="details">
                    <h2>หลงลับแล</h2>
                    <p>ทุเรียนหลงลับแล</p>
                    <p class="weight-grade">น้ำหนัก: 1-1.5 kg | เกรด: C</p>
                    <a href="product.php?name=LongLapLae" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://assets.tops.co.th/NONE-PuangmaneeDurianaverageweight4kilogramsper1Durianincludeshell-0215979000009-1" alt="Phomani">
                <div class="details">
                    <h2>พมณี</h2>
                    <p>ทุเรียนพมณี</p>
                    <p class="weight-grade">น้ำหนัก: 3-3.5 kg | เกรด: B</p>
                    <a href="product.php?name=Phomani" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://www.infoquest.co.th/wp-content/uploads/2024/11/0E2C8DB5EABF538F01754189F0BDA1BE.jpg" alt="Khao Kam">
                <div class="details">
                    <h2>ขาวคำ</h2>
                    <p>ทุเรียนขาวคำ</p>
                    <p class="weight-grade">น้ำหนัก: 2-3 kg | เกรด: C</p>
                    <a href="product.php?name=KhaoKam" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://assets.tops.co.th/NONE-VMonthongDurianC-0210467000004-1" alt="Donkon">
                <div class="details">
                    <h2>ดอนคอม</h2>
                    <p>ทุเรียนดอนคอม</p>
                    <p class="weight-grade">น้ำหนัก: 2-2.5 kg | เกรด: A</p>
                    <a href="product.php?name=Donkon" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://static.thairath.co.th/media/HCtHFA7ele6Q2dUKCOqAGeM0xFXEMOV0KD0grI2Ivk8j3XL9U7C1cnHxJ2dydonQTi.jpg" alt="Tong Fah">
                <div class="details">
                    <h2>ทองฟ้า</h2>
                    <p>ทุเรียนทองฟ้า</p>
                    <p class="weight-grade">น้ำหนัก: 2.5-3 kg | เกรด: B</p>
                    <a href="product.php?name=TongFah" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://www.technologychaoban.com/wp-content/uploads/2017/07/1398843955.jpg" alt="Samran">
                <div class="details">
                    <h2>สำราญ</h2>
                    <p>ทุเรียนสำราญ</p>
                    <p class="weight-grade">น้ำหนัก: 2-2.5 kg | เกรด: A</p>
                    <a href="product.php?name=Samran" class="view-more">สั่งซื้อ</a>
                </div>
            </div>

            <div class="durian-item">
                <img src="https://www.ตลาดเกษตรกรออนไลน์.com/uploads/products/cover_644f6d6e111e4.jpg" alt="Sukho">
                <div class="details">
                    <h2>สุโข</h2>
                    <p>ทุเรียนสุโข</p>
                    <p class="weight-grade">น้ำหนัก: 1.5-2 kg | เกรด: C</p>
                    <a href="product.php?name=Sukho" class="view-more">สั่งซื้อ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <h2>ติดต่อเรา</h2>
        <p>DurianSA Co., Ltd.</p>
        <p>123 Durian Street, Bangkok, Thailand</p>
        <p>Phone: +66 123 456 789</p>
        <p>Email: <a href="mailto:info@duriansa.com">info@duriansa.com</a></p>
        <p>ติดตามเราบน <a href="#">Facebook</a> | <a href="#">Instagram</a> | <a href="#">Twitter</a></p>
    </div>

</body>
</html>