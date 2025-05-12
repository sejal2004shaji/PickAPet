<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Cart</title>
    <style>
        /* General page styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .cart-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 30px;
        }

        /* Item card styling */
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .cart-item img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .cart-item div {
            flex-grow: 1;
            padding: 0 20px;
        }

        .cart-item div strong {
            font-size: 16px;
            color: #333;
        }

        .cart-item a {
            color: #dc3545;
            font-size: 20px;
            text-decoration: none;
        }

        /* Price summary box */
        .price-summary {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .price-summary h3 {
            margin-bottom: 10px;
            color: #444;
        }

        .price-summary p {
            font-size: 16px;
            color: #666;
        }

        /* Continue button styling */
        .continue-btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            font-size: 18px;
            text-align: center;
            display: block;
            text-decoration: none;
            margin: 30px auto;
            font-weight: bold;
            text-transform: uppercase;
            width: 200px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .continue-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item img {
                width: 100px;
                margin-bottom: 15px;
            }

            .continue-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="cart-container">
        <?php 
        session_start();
        require 'php/config.php'; // Ensure you have a connection to your database

        // Initialize total price
        $totalPrice = 0;

        // Check if the cart session exists and has items
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<h2 style='text-align: center; color: red;'>Your cart is empty.</h2>";
        } else {
            echo "<h2 style='text-align: center; color: #333;'>Items In Your Cart</h2>";
            echo "<ul style='list-style-type: none; padding: 0;'>";

            // Loop through each item in the cart
            foreach ($_SESSION['cart'] as $item) {
                echo "<li class='cart-item'>";

                // Fetch the image path
                $imagePath = "img/" . htmlspecialchars($item['media']);
                echo "<img src='" . $imagePath . "' alt='Pet Image'>";

                // Query the database to get the breed, pet type, and price
                $petId = htmlspecialchars($item['id']); // Get the pet ID from the cart item
                $query = "SELECT pet_type, breed, price FROM pet_upload_requests WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $petId); // Use prepared statements for security
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    $petDetails = $result->fetch_assoc();
                    $petType = $petDetails['pet_type'];
                    $breed = $petDetails['breed'];
                    $price = $petDetails['price'];
                } else {
                    $petType = "Unknown";
                    $breed = "Unknown";
                    $price = 0; // Set price to 0 if no matching pet found in DB
                }

                // Display pet details
                echo "<div>";
                echo "<strong>Pet Type:</strong> " . htmlspecialchars($petType) . "<br>";
                echo "<strong>Breed:</strong> " . htmlspecialchars($breed) . "<br>";
                echo "<strong>Price:</strong> ₹" . htmlspecialchars($price) . "<br>";
                echo "</div>";

                // Add the fetched price from the database to the total price
                $totalPrice += $price;

                // Ensure 'pet_id' is set, otherwise display an error
                if (!isset($item['id'])) {
                    echo "<p style='color: red;'>Error: Pet ID is missing for this item.</p>";
                } else {
                    // Only display the remove (trash icon) link
                    echo '<a href="remove_from_cart.php?pet_id=' . htmlspecialchars($item['id']) . '" style="margin-left: 10px; color: #dc3545; font-size: 20px; text-decoration: none;">';
                    echo '<i class="fas fa-trash-alt"></i>';
                    echo '</a>';
                }

                echo "</li>";
            }
            echo "</ul>";

            // Display total price information
            echo "<div class='price-summary'>";
            echo "<h3>Price Details (" . count($_SESSION['cart']) . " Items)</h3>";
            echo "<p>Total Product Price: ₹" . $totalPrice . "</p>";
            echo "<h3>Order Total: ₹" . $totalPrice . "</h3>";

            // Continue button
            echo '<a href="summary.php" class="continue-btn">Continue</a>';
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>