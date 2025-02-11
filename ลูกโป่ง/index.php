<?php
session_start();
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Burst - Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url(https://www.agoda.com/wp-content/uploads/2024/08/teamLab-Fukuoka.jpg) no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .register-container h1 {
            color: #ff6f61;
            margin-bottom: 20px;
            font-size: 32px;
        }

        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .register-container button:hover {
            background: #ff5746;
        }

        .register-container a {
            display: block;
            margin-top: 15px;
            color: #ff6f61;
            text-decoration: none;
            font-size: 14px;
        }

        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form action="signup_db.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="c_password" placeholder="Confirm Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <a href="signin.php">Already have an account? Log in</a>
    </div>
</body>
</html>
