<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login to access this page';
    header('location: signin.php');
    exit();
}

// Fetch products from the database
$sql = "SELECT p.product_id, dt.type_name, p.price, p.qty AS stock, p.grade 
        FROM products p 
        JOIN DurianTypes dt ON p.type_id = dt.type_id 
        WHERE p.qty > 0";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);
    
    $product = array_filter($products, function($p) use ($product_id) {
        return $p['product_id'] == $product_id; // ใช้ product_id ให้ตรงกับคอลัมน์ในฐานข้อมูล
    });
    $product = reset($product);
    
    if ($product && $quantity > 0 && $quantity <= $product['stock']) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['type_name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }
        $_SESSION['success'] = 'Product added to cart successfully!';
    } else {
        $_SESSION['error'] = 'Invalid quantity or not enough stock!';
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* Styles here */
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
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 36px;
            color: #333;
        }
        .cart-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ff6f61;
            color: white;
        }
        .total-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .total-container h2 {
            margin-right: 20px;
        }
        .checkout-btn {
            background-color: #ff6f61;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .checkout-btn:hover {
            background-color: #ff5746;
        }
        .quantity-input {
            width: 60px;
            padding: 5px;
        }
        .add-to-cart-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-to-cart-btn:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="durianhome.php" class="logo">DurianSA</a>
        <ul>
            <li><a href="durianhome.php">Home</a></li>
            <li><a href="duriantype.php">DurianTypes</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="signin.php">Logout</a></li>
        </ul>
    </nav>

    <h1>Your Shopping Cart</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <div class="cart-container">
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Available Stock</th>
                    <th>Grade</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['type_name']); ?></td>
                    <td><?php echo number_format($product['price'], 2); ?> Baht</td>
                    <td><?php echo $product['stock']; ?></td>
                    <td><?php echo htmlspecialchars($product['grade']); ?></td>
                    <td>
                        <form method="POST">
                            <input type="number" name="quantity" value="0" min="0" max="<?php echo $product['stock']; ?>" class="quantity-input" required>
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <!-- <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button> -->
                        </form>
                    </td>
                    <td class="item-total">0.00 Baht</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-container">
            <h2>Total: <span id="totalAmount">0.00</span> Baht</h2>
            <h2>Total Quantity: <span id="totalQuantity">0</span></h2>
            <button class="checkout-btn" onclick="proceedToCheckout()">Proceed to Checkout</button> 
        </div>
    </div>

    <script>
        const totalPriceElement = document.querySelector('#totalAmount');
        const totalQuantityElement = document.querySelector('#totalQuantity');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        quantityInputs.forEach(input => {
            input.addEventListener('input', updateCart);
        });

        function updateCart() {
            let newTotal = 0;
            let totalQuantity = 0; // Variable to keep track of total quantity

            document.querySelectorAll('tbody tr').forEach((row) => {
                const price = parseFloat(row.cells[1].textContent.replace(' Baht', '').replace(',', ''));
                const quantity = parseInt(row.querySelector('.quantity-input').value);
                const totalPerItem = price * quantity;

                row.querySelector('.item-total').textContent = `${totalPerItem.toFixed(2)} Baht`;
                newTotal += totalPerItem;
                totalQuantity += quantity; // Add to total quantity
            });

            totalPriceElement.textContent = `${newTotal.toFixed(2)}`;
            totalQuantityElement.textContent = totalQuantity; // Update total quantity
        }

        function proceedToCheckout() {
            const totalAmount = totalPriceElement.textContent;
            const totalQuantity = totalQuantityElement.textContent; // Get the displayed total quantity
            window.location.href = `checkout.php?total=${totalAmount}&quantity=${totalQuantity}`; // Pass total quantity to checkout
        }

        // Initial update of the cart
        updateCart();
    </script>
</body>
</html>
