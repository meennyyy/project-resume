<?php 
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login to access this page';
    header('location: signin.php');
    exit();
}

$dbname = "registersystem";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT id, name, price, stock FROM products WHERE stock > 0";
$result = $conn->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);
    
    $product = array_filter($products, function($p) use ($product_id) {
        return $p['id'] == $product_id;
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
                'name' => $product['name'],
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
    <title>Shopping Cart - Bubble Burst</title>
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
            margin-right: 50px;
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
        <a href="user.php" class="logo">Bubble Burst</a>
        <ul>
            <li><a href="bubblepage.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="logout.php">Logout</a></li>
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
                    <th>Product</th>
                    <th>Price</th>
                    <th>Available Stock</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo number_format($product['price'], 2); ?> Baht</td>
                    <td><?php echo $product['stock']; ?></td>
                    <td>
                        <input type="number" value="0" min="0" max="<?php echo $product['stock']; ?>" 
                               class="quantity-input" data-price="<?php echo $product['price']; ?>"
                               data-product-id="<?php echo $product['id']; ?>"
                               id="<?php echo $product['id']; ?>">
                               
                    </td>
                    <td class="item-total">0.00 Baht</td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="quantity" class="quantity-hidden">
    
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-container">
            <h2>Total: 0.00 Baht</h2>
            <button class="checkout-btn" onclick="proceedToCheckout()">Proceed to Checkout</button> 
        </div>
    </div>

    <script>
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totalPriceElement = document.querySelector('.total-container h2');
        let cart=[]
        
        quantityInputs.forEach(input => {
            input.addEventListener('input', updateCart);
        });

        function updateCart() {
            let newTotal = 0;
            let cartInner = []
            document.querySelectorAll('tbody tr').forEach((row) => {
                const input = row.querySelector('.quantity-input');
                const price = parseFloat(input.dataset.price);
               const id=input.id
                const quantity = parseInt(input.value);
                const totalPerItem = price * quantity;
                row.querySelector('.item-total').textContent = `${totalPerItem.toFixed(2)} Baht`;
                row.querySelector('.quantity-hidden').value = quantity;

                 cartInner.push({id:id, amount:quantity})
                newTotal += totalPerItem;
            });
            const filteredCart = cartInner.filter(item => item.amount > 0);

            cart=filteredCart
            totalPriceElement.textContent = `Total: ${newTotal.toFixed(2)} Baht`;
        }

        function proceedToCheckout() {
            const totalAmount = totalPriceElement.textContent.replace('Total: ', '').replace(' Baht', '');
            localStorage.setItem('cart', JSON.stringify(cart));
            window.location.href = `checkout.php?total=${totalAmount}`;
        }

        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                const quantityInput = form.querySelector('.quantity-hidden');
                if (parseInt(quantityInput.value) === 0) {
                    e.preventDefault();
                    alert('Please select a quantity greater than 0.');
                }
            });
        });

        // Initial update of the cart
        updateCart();
    </script>
</body>
</html>