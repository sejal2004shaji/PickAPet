<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100;
        }

        .container {
            width: 80%;
            max-width: 600px; /* Adjusted for vertical layout */
            margin: 0 auto;
            height: 700px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        #greeting {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        nav {
            display: flex;
            flex-direction: column; /* Changed to vertical layout */
            justify-content: center;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
        }

        nav a {
            color: black;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin: 10px ; /* Space between links */
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #7AB730;
        }
      
    </style>
</head>
<body>
    <div class="container">
       
        <div id="greeting">Haii Username</div> <!-- Placeholder for greeting -->
    
        <nav>
            <a href="petcare.php"><h4>💡 PetCare Tips</h4></a>
            <a href="petacces.php"><h4>🏬 Pet Accessory Shops</h4></a>
            <a href="vethos.php"><h4>🏩 Pet Hospitals</h4></a>
            <a href="medico.php"><h4>💉 Medico</h4></a>
            <a href="knowabout.php"><h4>🗯 Know About Us</h4></a>
        </nav>
    </div>

    <script>
        // JavaScript to dynamically set the username
        document.addEventListener("DOMContentLoaded", function() {
            var username = ""; // Replace with the actual username logic
            document.getElementById("greeting").textContent = " 🎀 Haii " + username;
        });
    </script>
</body>
</html>
