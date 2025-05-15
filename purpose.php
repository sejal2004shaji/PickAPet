<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .form-container {
            width:300px;
            margin: 0 auto;
            text-align: center;

        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        button {
            margin:7px;
            margin:11px;
            width: 100%;
            padding: 10px;
            background-color:#7AB730;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color:black;
        }
    </style>
    <title>Form</title>
</head>
<body>
    <div class="form-container">
        <h2>PURPOSE OF BUYING</h2>
        
        <form id="actionForm" method="post">
            <button type="submit" name="action" value="GrowUp">Grow Up</button>
            <button type="submit" name="action" value="Rent">Rent</button>
        </form>
    
        
    </div>
        
<script>
        document.getElementById("actionForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevents the form from submitting normally

            var action = document.activeElement.value; // Get the value of the clicked button
            if (action === "GrowUp") {
                window.location.href = "growup.php"; // Redirect to grow-up-page.html
            } else if (action === "Rent") {
                window.location.href = "rent.php"; // Redirect to rent-page.html
            }
        });
    </script>
</body>
</html>