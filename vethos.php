<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Find Veterinary Pet Hospitals Near You</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .search-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }
    .search-container h2 {
        text-align: center;
    }
    .search-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .search-container button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    .search-container button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<div class="search-container">
    <h2>Find Veterinary Pet Hospitals Near You</h2>
    <form action="https://www.google.com/maps/search/" method="get" target="_blank">
        <label for="zipcode">Enter your pinCode:</label>
        <input type="text" id="pincode" name="q" placeholder="Enter  pincode" required>

        <button type="submit">Search</button>
    </form>
</div>

</body>
</html>
