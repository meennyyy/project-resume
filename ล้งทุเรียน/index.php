<?php
session_start();
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DurianSA - Register</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background: url('https://www.chiangraifocus.com/wp-content/uploads/2023/08/%E0%B8%A7%E0%B8%B4%E0%B8%A7%E0%B8%AA%E0%B8%A7%E0%B8%A2%E0%B9%86_%E0%B8%AA%E0%B8%A7%E0%B8%99%E0%B8%97%E0%B8%B8%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%99%E0%B8%B2%E0%B8%87%E0%B8%99%E0%B8%AD%E0%B8%99-7.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .register-container h1 {
            color: #339933;
            margin-bottom: 30px;
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
            font-size: 16px;
            transition: border 0.3s;
        }

        .register-container input:focus {
            border-color: #339933;
            outline: none;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background: #339933;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .register-container button:hover {
            background: #FFFF66;
            color: #339933;
        }

        .register-container a {
            display: block;
            margin-top: 15px;
            color: #339933;
            text-decoration: none;
            font-size: 14px;
        }

        .register-container a:hover {
            text-decoration: underline;
        }

        /* Durian icon or text in top right corner */
        .durian {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: #339933;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
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
