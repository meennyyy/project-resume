<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - Bubble Burst</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .message {
            margin: 50px;
            font-size: 24px;
            color: #333;
        }

        .back-btn {
            margin-top: 20px;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #ff5746;
        }
    </style>
</head>
<body>

    <div class="message">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed.</p>
        <a href="user.php" class="back-btn">Back to Home</a>
    </div>

</body>
</html>
