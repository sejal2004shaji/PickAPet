<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qrcode.php</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #7AB730;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
        }
        .qr-code {
            width: 200px;
            height: 200px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .qr-code img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }
        .message {
            margin-top: 20px;
            font-size: 24px;
            font-weight: 600;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        button{
            background-color:black;
            border-radius: 5px;
            color:white;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PaymentLink" alt="QR Code">
        </div>
        <div class="message">Scan here to make your Payment</div>
        <p>Thank you for choosing Phone Pay!</p>
        <button onclick="location.href='paysucces.php'">Done</button>

    </div>
</body>
</html>
