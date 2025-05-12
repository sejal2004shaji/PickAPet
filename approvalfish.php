<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #7AB730;
        }
        .approval-box {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 300px;
        }
        .approval-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .approval-box p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        .approval-box .buttons {
            display: flex;
            justify-content: space-between;
        }
        .approval-box .buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background 0.3s ease;
            font-weight: bold;
            color: #fff;
        }
        .approval-box .buttons a.yes-btn {
            background: #4CAF50;
        }
        .approval-box .buttons a.yes-btn:hover {
            background: #45a049;
        }
        .approval-box .buttons a.no-btn {
            background: #f44336;
        }
        .approval-box .buttons a.no-btn:hover {
            background: #e53935;
        }

    </style>
</head>
<body>
    <div class="approval-box">
        <h2>Admin Approval Required</h2>
        <p>Is Admin Approve to upload the picture?</p>
        <div class="buttons">
            <a href="fishsubmit.php" class="yes-btn">Yes</a>
            <a href="imageupload.php" class="no-btn">No</a>
        </div>
    </div>
</body>
</html>

 