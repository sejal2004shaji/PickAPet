<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "tutorial");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the deletion request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    
    // Delete from wishlist
    $delete_sql = "DELETE FROM pet_upload_requests WHERE id = $delete_id";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
}

// Fetch and display wishlist items
$sql = "SELECT id, media, price, breed, username, date, pet_type FROM pet_upload_requests";
$result = $conn->query($sql);

if ($result === FALSE) {
    // Display the error message if the query fails
    echo "Error fetching wishlist items: " . $conn->error;
} else {
    // Proceed with displaying the items
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
            color: red;
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
            while ($row = $result->fetch_assoc()) {
                echo '<div class="wishlist-item">';

                // Use different file paths based on pet_type
                switch ($row["pet_type"]) {
                    case "cow":
                        echo '<img src="uploads/cows/' . $row["media"] . '" alt="Cow Image">';
                        break;
                    case "dog":
                        echo '<img src="uploads/dogs/' . $row["media"] . '" alt="Dog Image">';
                        break;
                    case "cat":
                        echo '<img src="uploads/cats/' . $row["media"] . '" alt="Cat Image">';
                        break;
                    case "bird":
                        echo '<img src="uploads/birds/' . $row["media"] . '" alt="Bird Image">';
                        break;
                    case "rabbit":
                        echo '<img src="uploads/rabbits/' . $row["media"] . '" alt="Rabbit Image">';
                        break;
                    case "fish":
                        echo '<img src="uploads/fishes/' . $row["media"] . '" alt="Fish Image">';
                        break;
                    default:
                        echo '<img src="uploads/others/' . $row["media"] . '" alt="Pet Image">';
                        break;
                }

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
        ?>
    </div>

</body>
</html>

<?php
}
$conn->close();
?>
