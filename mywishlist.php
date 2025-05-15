<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "tutorial");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the wishlisted item into a wishlist table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_id'])) {
        // Handle delete request
        $delete_id = $_POST['delete_id'];
        $sql = "DELETE FROM pet_upload_requests WHERE id = $delete_id";
        
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error deleting item: " . $conn->error;
        }
    } else {
        // Handle adding to wishlist
        $media = $_POST['media'];
        $price = $_POST['price'];
        $breed = $_POST['breed'];
        $username = $_POST['username'];
        $date = $_POST['date'];

        $sql = "INSERT INTO wishlist (media, price, breed, username, date) 
                VALUES ('$media', '$price', '$breed', '$username', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "Wishlist updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch and display wishlist items
$sql = "SELECT id, media, price, breed, username, date FROM pet_upload_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <style>
        /* Center the wishlist items */
        .wishlist-container {
            text-align: center;
            padding: 20px;
        }

        /* Heart icon styling */
        .wishlist-icon {
            color:red;
            transition: color 0.3s ease;
            font-size: 48px;
            display: block;
            margin: 0 auto 20px;
        }

        /* Hover effect for the heart icon */
        .wishlist-container:hover .wishlist-icon {
            color: red;
        }

        /* Wishlist item styling */
        .wishlist-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px auto;
            background-color: #f9f9f9;
            max-width: 400px;
            text-align: left;
            position: relative;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .wishlist-item img {
            max-width: 100%;
            display: block;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .wishlist-item p {
            margin: 5px 0;
        }

        .wishlist-item h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Delete button styling */
        .delete-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #e60000;
        }

    </style>
</head>
<body>

    <!-- Wishlist items -->
    <div class="wishlist-container">
        <i class="wishlist-icon">&#9829;</i> <!-- Heart symbol (Unicode) -->
        <h2>Your Wishlist</h2>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="wishlist-item">';
                echo '<img src="uploads/dogs/' . $row["media"] . '" alt="">';
                echo '<img src="uploads/cows/' . $row["media"] . '" alt="">';
                echo '<img src="uploads/rabbits/' . $row["media"] . '" alt="">';
                echo '<img src="uploads/fishes/' . $row["media"] . '" alt="">';
                echo '<img src="uploads/birds/' . $row["media"] . '" alt="">';
                echo '<img src="uploads/cats/' . $row["media"] . '" alt="">';
                echo '<h2>' . $row["breed"] . '</h2>';
                echo '<p>Price: ₹' . $row["price"] . '</p>';
                echo '<p>Uploaded by: ' . $row["username"] . '</p>';
                echo '<p>Date: ' . $row["date"] . '</p>';
                
                // Delete button
                echo '<form method="POST" style="display:inline-block;">
                        <input type="hidden" name="delete_id" value="' . $row["id"] . '">
                        <button type="submit" class="delete-button">Delete</button>
                      </form>';
                echo '</div>';
            }
        } else {
            echo "Your wishlist is empty.";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>