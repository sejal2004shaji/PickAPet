<?php
session_start();
include("php/config.php");

// Check if user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: login1.php"); // Redirect to login if not logged in
    exit();
}

// Fetch cart items for the logged-in user
$email = $_SESSION['Email'];
$query = "SELECT media, breed, price, pet_type FROM cart WHERE Email = '$email'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            animation: fadeInDown 1s ease-in-out;
        }
        .cart-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            padding: 20px;
        }
        .cart-item {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            transition: transform 0.4s, box-shadow 0.4s;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }
        .cart-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
        }
        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .btn-buy-now {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-buy-now:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        @keyframes fadeInDown {
            from { 
                opacity: 0; 
                transform: translateY(-20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
    </style>
</head>
<body>
    <h1>My Cart</h1>
    <div class="cart-gallery">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='cart-item'>
                        <img src='uploads/{$row['media']}' alt='Pet Image'>
                        <h2>Breed: {$row['breed']}</h2>
                        <p>Price: ₹{$row['price']}</p>
                        <p>Pet Type: {$row['pet_type']}</p>
                        <button class='btn-buy-now'>Buy Now</button>
                      </div>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>
</body>
</html>
