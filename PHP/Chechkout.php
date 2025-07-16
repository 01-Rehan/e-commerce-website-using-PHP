<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to proceed to checkout.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch cart items
$query = "SELECT c.id as cart_id, p.name, p.price, c.quantity 
          FROM cart c 
          JOIN product p ON c.product_id = p.id 
          WHERE c.user_id = $user_id";
$result = mysqli_query($connection, $query);

$total = 0;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background:rgb(255, 234, 0);
            color: black;
        }

        .total {
            font-weight: bold;
            color: #222;
            font-size: 18px;
        }

        .place-order-btn {
            display: block;
            width: 100%;
            padding: 14px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
        }

        .place-order-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Your Cart</h2>

    <form action="placeOrder.php" method="POST">
        <table>
            <tr>
                <th>Item</th>
                <th>Price (₹)</th>
                <th>Quantity</th>
                <th>Subtotal (₹)</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): 
                $subtotal = $row['price'] * $row['quantity'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $subtotal ?></td>
                </tr>
            <?php endwhile; ?>

            <tr>
                <td colspan="3" class="total">Total</td>
                <td class="total">₹<?= $total ?></td>
            </tr>
        </table>

        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="total_amount" value="<?= $total ?>">

        <button type="submit" class="place-order-btn">Place Order</button>
    </form>
</div>
</body>
</html>