<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .animal-card {
            text-align: center;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            max-width: 300px;
            float: left; /* Align to the left */
            margin-right: 20px; /* Optional: Add space to the right */
        }
        .animal-card h2 {
            margin-top: 0;
        }
        .animal-details {
            margin: 15px 0;
        }
        .animal-details span {
            display: block;
            margin: 5px 0;
        }
        .animal-image {
            max-width: 100%;
            border-radius: 10px;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .buttons a {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .add-to-cart {
            background-color: #7AB730;
            color:white;
            margin-right: 10px; /* Add margin to the right of the Add to Cart button */
        }
        .wishlist {
            background-color:#7AB730;
            color: white;
            margin-left: 10px; /* Add margin to the left of the Add to Wishlist button */
        }
        .blinking {
            animation: blink-animation 1s steps(5, start) infinite;
        }
        @keyframes blink-animation {
            50% {
                background-color: yellow;
            }
        }
    </style>
    <script>
        function blink(element) {
            element.classList.add("blinking");
            setTimeout(function() {
                element.classList.remove("blinking");
            }, 1000); // duration of the blinking effect
        }
    </script>
</head>
<body>

    <div class="animal-card">
        <h2>Animal Details</h2>
        <img src="img/dog.jpg" alt="Animal Image" class="animal-image">
        <div class="animal-details">
            <span><strong>Breed:</strong> Golden Retriever</span>
            <span><strong>Price:</strong> $800</span>
        </div>
        <div class="buttons">
            <a href="purpose.php" class="add-to-cart" onclick="blink(this)">Add to Cart</a>
            <a href="wishlist.php" class="wishlist" onclick="blink(this)">Add to Wishlist</a>
        </div>
    </div>
    <div class="animal-card">
        <h2>Animal Details</h2>
        <img src="img/cow.jpeg" alt="Animal Image" class="animal-image">
        <div class="animal-details">
            <span><strong>Breed:</strong> Golden Retriever</span>
            <span><strong>Price:</strong> $800</span>
        </div>
        <div class="buttons">
            <a href="purpose.php" class="add-to-cart" onclick="blink(this)">Add to Cart</a>
            <a href="wishlist.php" class="wishlist" onclick="blink(this)">Add to Wishlist</a>
        </div>
    </div>
    <div class="animal-card">
        <h2>Animal Details</h2>
        <img src="img/cat.jpeg" alt="Animal Image" class="animal-image">
        <div class="animal-details">
            <span><strong>Breed:</strong> Golden Retriever</span>
            <span><strong>Price:</strong> $800</span>
        </div>
        <div class="buttons">
            <a href="purpose.php" class="add-to-cart" onclick="blink(this)">Add to Cart</a>
            <a href="wishlist.php" class="wishlist" onclick="blink(this)">Add to Wishlist</a>
        </div>
    </div>
    <div class="animal-card">
        <h2>Animal Details</h2>
        <img src="img/rabbit.jpeg" alt="Animal Image" class="animal-image">
        <div class="animal-details">
            <span><strong>Breed:</strong> Golden Retriever</span>
            <span><strong>Price:</strong> $800</span>
        </div>
        <div class="buttons">
            <a href="purpose.php" class="add-to-cart" onclick="blink(this)">Add to Cart</a>
            <a href="wishlist.php" class="wishlist" onclick="blink(this)">Add to Wishlist</a>
        </div>
    </div>
    <div class="animal-card">
        <h2>Animal Details</h2>
        <img src="https://via.placeholder.com/250" alt="Animal Image" class="animal-image">
        <div class="animal-details">
            <span><strong>Breed:</strong> Golden Retriever</span>
            <span><strong>Price:</strong> $800</span>
        </div>
        <div class="buttons">
            <a href="purpose.php" class="add-to-cart" onclick="blink(this)">Add to Cart</a>
            <a href="wishlist.php" class="wishlist" onclick="blink(this)">Add to Wishlist</a>
        </div>
    </div>

</body>
</html>