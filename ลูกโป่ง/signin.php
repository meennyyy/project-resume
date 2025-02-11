<?php
session_start();
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Burst - Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url(https://www.agoda.com/wp-content/uploads/2024/08/teamLab-Fukuoka.jpg) no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        .login-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #ff5746;
        }

        .login-container a {
            display: block;
            margin-top: 15px;
            color: #ff6f61;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://thumb.ac-illust.com/e9/e9d8e8f032f250ad0bc3e7afe180ec83_t.jpeg" width="150" height="85">
        <h1>Bubble Burst Login</h1>
        <form action="signin_db.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signin">Login</button>
        </form>
        <a href="index.php">Register</a>
    </div>
</body>
</html>
