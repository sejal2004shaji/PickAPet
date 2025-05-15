<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Form </title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            font-size:16;
        }

        header {
            background-color:#7AB730;
            color: white;
            text-align: center;
            padding:1px;
            margin-bottom:10px;
        }

        main {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color:#7AB730;
        }

        .form-group input {
            width: calc(100% - 16px);
            padding: 10px;
            border: 1px solid #7AB730;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 2px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-align: center;
            margin-top: 20px;
        }

        button:hover {
            background-color: black;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        .title {
            font-size: 24px;
            margin-top: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 2px solid #7AB730;
        }

        th {
            background-color: #f2f2f2;
        }

        .confirmation {
            background-color: #E6FFE6;
            border: 1px solid #C2E0C2;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .qr-section {
            margin-top: 30px;
            text-align: center;
        }

        .qr-section img {
            width: 200px;
            height: 200px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        /* Container Styling */
        .form-container {
            width: 300px;
            margin:20px auto;
            padding: 50px;
            border: 2px solid #7AB730;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height:90px;
        }

        /* Label Styling */
        label {
            font-weight: bold;
            display: block;
            margin-top:0px;
            margin-bottom:5px;
            color:green;
        }

        /* Select Styling */
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #7AB730;
            border-radius: 5px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        select:focus {
            outline: none;
            border-color:black; /* Green border color on focus */
        }

        /* Option Styling */
        option {
            font-size: 16px;
            color:green;
        }
        /* Button Styling */
        .pay-button {
            align-self: flex-end; /* Align button to the end of flex container */
            margin-top:15px; /* Push button to the bottom */
            display: inline-block;
            padding: 10px 20x;
            background-color: #4CAF50; /* Green background */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-button:hover {
            background-color:black; /* Darker green on hover */
        }
        .order-container h1 {
            color:#7AB730;
            margin-bottom: 20px;
            font-size:24px;
        }

        .order-container input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <header>
        <h1>Rental Form</h1>
    </header>
    <main>
        <form action="payment.php" method="post">
           
            <div class="form-group">
                <label for="cvv">Ending Date:</label>
                <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
            </div>
           
         
            
            <div class="form-container">
      <label for="payment">Choose a Payment Method:</label>
      <select name="payment" id="payment">
        <option value="Visacard">Visacard</option>
        <option value="Phonepay">Phonepay</option>
        <option value="Creditcard">Creditcard</option>
      </select>
    <button type="button"  id="pay-button" class="pay-button">Pay</button>
    </div>
    <script>
        document.getElementById("pay-button").addEventListener("click", function() {
            var payment = document.getElementById("payment").value;
            if (payment==="Phonepay") {
                window.location.href = "qrcode.php";
            } 
        });
    </script>
        <script>
        document.getElementById("pay-button").addEventListener("click", function() {
            var payment= document.getElementById("payment").value;
            if (payment=== "Visacard" || payment=== "Creditcard") {
                window.location.href = "paysucces.php";
            } 
        });
    </script>
   
            
        </form>
        
       
    </main>
</body>
</html>