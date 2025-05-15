<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Delivery Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e3f2fd;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 500px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            color: #1976d2;
            margin-bottom: 20px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #cfd8dc;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            background-color: #0288d1;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0277bd;
        }
        .message {
            color: #388e3c;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pet Delivery Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $petType = htmlspecialchars($_POST['pet_type']);
            $deliveryDate = htmlspecialchars($_POST['delivery_date']);
            echo "<p class='message'>Thank you, $name! Your $petType will be delivered on $deliveryDate.</p>";
        }
        ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="address" placeholder="Delivery Address" required>
            <select name="pet_type" required>
                <option value="" disabled selected>Select Pet Type</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="Bird">Bird</option>
                <option value="Rabbit">Rabbit</option>
            </select>
            <input type="date" name="delivery_date" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
