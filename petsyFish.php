<?php
include("php/config.php");

// Fetch approved pet details for birds
$query = "SELECT media, pet_type, breed, price FROM pet_upload_requests WHERE pet_type = 'Fish' AND status = 1";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Fishes</title>
    <link rel="stylesheet" href="style100.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .pet-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .pet-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            background: #fff;
            text-align: center;
            width: 200px; /* Adjust width as necessary */
            transition: transform 0.2s; /* Animation on hover */
        }
        .pet-item:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .pet-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        button, .btn-buy-now {
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, .btn-buy-now:hover {
            background-color: #218838;
        }
        .btn-buy-now {
            background-color: #007bff; /* Blue background for Buy Now */
        }
    </style>
</head>
<body>
    <header>
        <h1>Available Fishes</h1>
    </header>
    <div class="pet-gallery">
        <?php
        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='pet-item'>
                        <img src='uploads/{$row['media']}' alt='Fish Image'>
                        <h2>Breed: {$row['breed']}</h2>
                        <p>Price: ₹{$row['price']}</p> <!-- Displaying Price -->
                        <button onclick=\"window.location.href='addtocart.php?media={$row['media']}&breed={$row['breed']}&price={$row['price']}&pet_type={$row['pet_type']}'\">Add to Cart</button>
                        <button onclick=\"window.location.href='wishlist.php?media={$row['media']}&breed={$row['breed']}&price={$row['price']}&pet_type={$row['pet_type']}'\">&#9733; Add to Favorites</button>
                        <button class='btn-buy-now' onclick=\"window.location.href='checkout.php?media={$row['media']}&breed={$row['breed']}&price={$row['price']}&pet_type={$row['pet_type']}'\">Buy Now</button>
                      </div>";
            }
        } else {
            echo "<p>No available birds at the moment.</p>";
        }
        ?>
    </div>
</body>
</html>
