<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .logout-container {
            background-color: #ffffff;
            padding: 20px 30px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logout-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button-yes {
            background-color: #28a745;
            color: white;
        }
        .button-no {
            background-color: #dc3545;
            color: white;
        }
        .button-yes:hover {
            background-color: #218838;
        }
        .button-no:hover {
            background-color: #c82333;
        }
    </style>
    <script>
        function redirectToIndex() {
            window.location.href = 'index.php'; // Adjust the URL to your index page as needed
        }
    </script>
</head>
<body>
    <div class="logout-container">
        <h1>Do you want to Logout?</h1>
        <div class="button-container">
            <button class="button-yes" onclick="redirectToIndex()">YES</button>
            <button class="button-no">NO</button>
        </div>
    </div>
</body>
</html>
