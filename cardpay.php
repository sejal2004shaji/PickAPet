<!DOCTYPE html>
<html>
<head>
    <title>Payment Through Card</title>
    <style>
        .form-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function validateForm(event) {
            var cardNumber = document.forms["paymentForm"]["CardNumber"].value;
            var expiryDate = document.forms["paymentForm"]["ExpiryDate"].value;
            var cardholderName = document.forms["paymentForm"]["CardholderName"].value;
            var amount = document.forms["paymentForm"]["amount"].value;

            if (cardNumber == "" || expiryDate == "" || cardholderName == "" || amount == "") {
                alert("All fields must be filled out");
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Payment Information</h2>
        <form name="paymentForm" action="paysucces.php" method="POST" onsubmit="validateForm(event)">
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="CardNumber" placeholder="">

            <label for="expiryDate">Expiry Date</label>
            <input type="text" id="expiryDate" name="ExpiryDate" placeholder="MM/YY">

            <label for="cardholderName">Cardholder Name</label>
            <input type="text" id="cardholderName" name="CardholderName" placeholder="">

            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" placeholder="">

            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
