<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin: 15px 0 5px;
        }

        input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .star-rating {
            direction: rtl;
            display: inline-flex;
            margin-bottom: 10px;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating input[type="radio"]:checked ~ label {
            color: gold;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px; /* Added margin top for spacing */
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        #feedbackMessage {
            text-align: center;
            margin-top: 10px; /* Adjusted margin top */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>

        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <label for="rating">Rate your experience:</label>
            <div class="star-rating">
                <input type="radio" name="rating" id="star5" value="5"><label for="star5">&#9733;</label>
                <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
                <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
                <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
                <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
            </div>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tutorial";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];
            $rating = $_POST['rating'];

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO feedback (email, feedback, rating) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $email, $feedback, $rating);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<p id='feedbackMessage' style='color: green; text-align: center;'>Submitted successfully</p>";
            } else {
                echo "<p id='feedbackMessage' style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>

    <script>
        // JavaScript to hide the feedback message after 1 second
        setTimeout(function() {
            var feedbackMessage = document.getElementById('feedbackMessage');
            if (feedbackMessage) {
                feedbackMessage.style.display = 'none';
            }
        }, 1000);

        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating label');
            const radios = document.querySelectorAll('.star-rating input[type="radio"]');
            
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.previousElementSibling.value;
                    stars.forEach(label => {
                        label.style.color = label.htmlFor.slice(-1) <= rating ? 'gold' : '#ccc';
                    });
                });
            });
        });
    </script>
</body>
</html>