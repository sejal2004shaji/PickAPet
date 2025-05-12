<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .pet-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pet-details {
            flex: 1;
        }
        .pet-image {
            max-width: 150px;
            height: auto;
            border-radius: 5px;
        }
        .adopt-button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 3px;
            cursor: pointer;
        }
        .adopt-button:hover {
            background-color: #4cae4c;
        }
        .message {
            color: green;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Available Pets for Adoption</h2>
        <?php
        // Sample data of pets available for adoption
        $pets = array(
            array("name" => "Buddy", "type" => "Dog", "image" => "dog.jpg"),
            array("name" => "Whiskers", "type" => "Cat", "image" => "cat.jpg"),
            array("name" => "Tweety", "type" => "Bird", "image" => "bird.jpg")
        );

        foreach ($pets as $pet) {
            echo "<div class='pet-card'>";
            echo "<div class='pet-details'>";
            echo "<h3>{$pet['name']}</h3>";
            echo "<p>Type: {$pet['type']}</p>";
            echo "</div>";
            echo "<img class='pet-image' src='images/{$pet['image']}' alt='{$pet['name']}'>";
            echo "<button class='adopt-button' data-name='{$pet['name']}' data-type='{$pet['type']}'>Adopt</button>";
            echo "</div>";
        }
        ?>
        <div id="adoption-form" style="display: none;">
            <h2>Adoption Form</h2>
            <form method="POST">
                <input type="hidden" id="adopt_name" name="adopt_name" value="">
                <input type="hidden" id="adopt_type" name="adopt_type" value="">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="phone" placeholder="Your Phone Number" required>
                <textarea name="message" rows="4" placeholder="Additional Message (optional)"></textarea>
                <button type="submit">Submit Adoption Request</button>
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $adopt_name = htmlspecialchars($_POST['adopt_name']);
            $adopt_type = htmlspecialchars($_POST['adopt_type']);
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $message = htmlspecialchars($_POST['message']);

            echo "<p class='message'>Thank you, $name! Your adoption request for $adopt_name ($adopt_type) has been received.</p>";
        }
        ?>
    </div>

    <script>
        // JavaScript to handle adoption button click and form display
        const adoptButtons = document.querySelectorAll('.adopt-button');
        const adoptionForm = document.getElementById('adoption-form');
        const adoptNameInput = document.getElementById('adopt_name');
        const adoptTypeInput = document.getElementById('adopt_type');

        adoptButtons.forEach(button => {
            button.addEventListener('click', () => {
                adoptNameInput.value = button.getAttribute('data-name');
                adoptTypeInput.value = button.getAttribute('data-type');
                adoptionForm.style.display = 'block';
            });
        });
    </script>
</body>
</html>
