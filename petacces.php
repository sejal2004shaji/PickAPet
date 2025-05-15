<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Find Pet Accessories Shop Near Me</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #4CAF50;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input[type="text"] {
        width: calc(100% - 12px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .form-group input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }
    #results {
        margin-top: 20px;
    }
    .shop-info {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border-left: 6px solid #4CAF50;
        border-radius: 4px;
    }
    .shop-info h3 {
        margin-top: 0;
        font-size: 18px;
        color: #333;
    }
    .shop-info p {
        margin-bottom: 0;
        color: #666;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Find Pet Accessories Shop Near Me</h1>
    <form id="searchForm" onsubmit="searchPetShop(); return false;">
        <div class="form-group">
            <label for="pincode">Enter your Pin Code:</label>
            <input type="text" id="pincode" name="pincode" placeholder="Enter your pin code..." required>
        </div>
        <div class="form-group">
            <input type="submit" value="Search">
        </div>
    </form>
    <div id="results">
        <!-- Results will be displayed here -->
    </div>
</div>

<script>
    function searchPetShop() {
        var pincode = document.getElementById('pincode').value;
        // Simulated data (replace with actual API call)
        var data = [
            { name: "Pet Paradise", phone: "(555) 123-4567" },
            { name: "Happy Pets", phone: "(555) 987-6543" },
            { name: "Paws & Claws", phone: "(555) 246-8101" }
        ];

        var resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';

        data.forEach(function(shop) {
            var shopInfo = '<div class="shop-info">';
            shopInfo += '<h3>' + shop.name + '</h3>';
            shopInfo += '<p><strong>Phone:</strong> ' + shop.phone + '</p>';
            shopInfo += '</div>';
            resultsDiv.innerHTML += shopInfo;
        });
    }
</script>

</body>
</html>
