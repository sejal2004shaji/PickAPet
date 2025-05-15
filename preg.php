<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #00796b;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #004d40;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #b2dfdb;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #00796b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Pet Registration</h1>
        <form action="register.php" method="POST">
            <label for="pet-type">Pet Type:</label>
            <input type="text" id="pet-type" name="pet_type" required>

            <label for="pet-name">Pet Name:</label>
            <input type="text" id="pet-name" name="pet_name" required>

            <label for="pet-breed">Pet Breed:</label>
            <input type="text" id="pet-breed" name="pet_breed" required>

            <label for="pet-age">Age:</label>
            <input type="number" id="pet-age" name="pet_age" required>

            <label for="characteristics">Characteristics:</label>
            <textarea id="characteristics" name="characteristics" rows="3"></textarea>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>

            <label for="wellness">Wellness Details:</label>
            <textarea id="wellness" name="wellness" rows="3"></textarea>

            <label for="place">Place:</label>
            <input type="text" id="place" name="place" required>

            <label for="visualisation">Visualisation:</label>
            <input type="text" id="visualisation" name="visualisation">

            <label for="medical-info">Medical Information:</label>
            <textarea id="medical-info" name="medical_info" rows="3"></textarea>

            <label for="pet-code">Pet Code:</label>
            <input type="text" id="pet-code" name="pet_code" required>

            <label for="pet-rate">Pet Rate:</label>
            <input type="number" id="pet-rate" name="pet_rate" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php
// register.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_type = $_POST['pet_type'];
    $pet_name = $_POST['pet_name'];
    $pet_breed = $_POST['pet_breed'];
    $pet_age = $_POST['pet_age'];
    $characteristics = $_POST['characteristics'];
    $color = $_POST['color'];
    $wellness = $_POST['wellness'];
    $place = $_POST['place'];
    $visualisation = $_POST['visualisation'];
    $medical_info = $_POST['medical_info'];
    $pet_code = $_POST['pet_code'];
    $pet_rate = $_POST['pet_rate'];
    
    echo "Registration successful for $pet_name, a $pet_age-year-old $color $pet_breed ($pet_type) with code $pet_code.";
}
?>
