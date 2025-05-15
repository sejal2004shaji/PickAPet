<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding:3px;
        }
        header {
            background-color:#7AB730;
            color: #fff;
            padding: 5px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        nav {
            background-color:#7AB730 ;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color:black;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #555;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content h2 {
            margin-top: 0;
        }
        .content p {
            line-height: 1.6;
        }
        .order-info {
            margin-top: 20px;
        }
        .order-info h3 {
            margin-bottom: 10px;
        }
        .order-info ul {
            list-style-type: none;
            padding: 0;
        }
        .order-info ul li {
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Order Details</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <a href="#tracking">Tracking Information</a>
            <a href="#history">Order History</a>
        </div>
    </nav>
    <div class="container">
        <div class="content" id="tracking">
            <h2>Tracking Information</h2>
            <p>Enter your order number below to get the latest tracking information.</p>
            <input type="text" placeholder="Order Number" style="padding: 10px; width: 100%; box-sizing: border-box;">
            <button style="margin-top: 10px; padding: 10px 20px; background-color:#7AB730  ; color: #fff; border: none; cursor: pointer; border-radius: 5px;">Track Order</button>
        </div>
        <div class="content order-info" id="history">
            <h2>Order History</h2>
            <h3>Recent Orders</h3>
            <ul>
                <li>
                    <strong>Order #123456</strong><br>
                    Date: 2024-07-01<br>
                    Status: Delivered
                </li>
                <li>
                    <strong>Order #123455</strong><br>
                    Date: 2024-06-25<br>
                    Status: In Transit
                </li>
                <li>
                    <strong>Order #123454</strong><br>
                    Date: 2024-06-15<br>
                    Status: Delivered
                </li>
            </ul>
        </div>
    </div>
   
</body>
</html>
