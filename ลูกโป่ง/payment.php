<?php 
session_start();
require_once 'config/db.php';
// ตรวจสอบการล็อกอิน
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login to access this page';
    header('location: signin.php');
    exit();
}


// ดึงค่าจาก query string
$name = isset($_GET['name']) ? $_GET['name'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
$total = isset($_GET['total']) ? $_GET['total'] : '0.00';

$dbname = "registersystem";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

// update cart
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    // Decode the JSON data
    $cart = json_decode($data, true);

    

    // Loop through the cart array and update the amount for each item
    foreach ($cart as $item) {
        $id = $item['id'];
        $amount = $item['amount'];
        
        // SQL query to update the amount for each item
        $sql = "UPDATE products SET stock = stock - $amount WHERE id = $id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Updated item ID $id successfully!<br>";
        } else {
            echo "Error updating item ID $id: " . $conn->error . "<br>";
        }
        
       
    }

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Bubble Burst</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
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
            font-size: 32px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 36px;
            color: #333;
        }

        .payment-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-item {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }

        .pay-btn {
            display: block;
            margin: 20px auto;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
            text-align: center;
            text-decoration: none;
        }

        .pay-btn:hover {
            background-color: #ff5746;
        }

        
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="user.php" class="logo">Bubble Burst</a>
    </nav>

    <h1>Payment</h1> 
   

    <div class="payment-container">
        <div class="payment-item" id="name">Name: <?php echo htmlspecialchars($name); ?></div>
        <div class="payment-item" id="address">Address: <?php echo htmlspecialchars($address); ?></div>
        <div class="payment-item" id="phone">Phone: <?php echo htmlspecialchars($phone); ?></div>
        <div class="payment-item" id="total">Total Amount: <?php echo htmlspecialchars($total); ?> Baht</div>
        <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">



        <!-- ส่วนสำหรับการทำจ่ายเงิน -->
        <form action="paymentsuccess.php" method="post">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <input type="hidden" name="address" value="<?php echo htmlspecialchars($address); ?>">
            <input type="hidden" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">
            
            <button type="submit2" onclick="updateCart()" class="pay-btn">Confirm and Pay</button>
        </form>
    </div>

</body>
<script>
    const storedData = localStorage.getItem('cart');
        const cart = storedData ? JSON.parse(storedData) : null;
        console.log(cart);
    
        function updateCart() {
            // Send cart data to PHP using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "payment.php", true); // Since this is the same page
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            
            // Handle response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText); // Display server response
                    document.getElementById('result').innerText = xhr.responseText; // Display in HTML
                }
            };

            // Send cart data as JSON
            xhr.send(JSON.stringify(cart));
            localStorage.removeItem("cart")
        }
</script>
</html>