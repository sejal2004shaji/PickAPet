<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            border: 2px solid #7AB730;
            padding: 20px;
            max-width: 550px;
            margin: 0 auto;
            position: relative;
        }
        .animal-photo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
        }
        .details, .deliver-to, .order-container, .price-details, .total-amount {
            border-top: 2px solid #7AB730;
            margin-top: 20px;
            padding-top: 10px;
        }
        .form-container {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #7AB730;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            font-weight: bold;
            color: green;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #7AB730;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .pay-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .pay-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <h1>Payment Method</h1>
        <div class="form-container">
            <label for="payment">Choose a Payment Method:</label>
            <select name="payment" id="payment">
                <option value="Visacard">Visa Card</option>
                <option value="Phonepay">PhonePay</option>
                <option value="Creditcard">Credit Card</option>
            </select>
            <label for="pet-name">What name would you like to call your pet?</label>
            <input type="text" id="pet-name" name="pet-name" placeholder="Enter pet name">
            <button type="button" id="pay-button" class="pay-button">Pay</button>
        </div>
    </div>

    <script>
        document.getElementById("pay-button").addEventListener("click", function() {
            var payment = document.getElementById("payment").value;
            if (payment === "Phonepay") {
                window.location.href = "qrcode.php";
            } else if (payment === "Visacard" || payment === "Creditcard") {
                window.location.href = "cardpay.php";
            }
        });
    </script>
</body>
</html>
