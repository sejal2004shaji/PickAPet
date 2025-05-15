<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return and Cancel Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            margin-bottom: 40px;
        }

        .form-container h2 {
            color: #555;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #7AB730 ;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color:#7AB730 ;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Return and Cancel Product</h1>

        <div class="form-container">
            <h2>Return Product</h2>
            <form action="/submit-return" method="post">
                <div class="form-group">
                    <label for="return-order-id">Order ID:</label>
                    <input type="text" id="return-order-id" name="order_id" required>
                </div>
                <div class="form-group">
                    <label for="return-reason">Reason for Return:</label>
                    <select id="return-reason" name="reason" required>
                        <option value="">Select a reason</option>
                        <option value="damaged">Damaged</option>
                        <option value="wrong-item">Wrong Item</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="return-comments">Additional Comments:</label>
                    <textarea id="return-comments" name="comments" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Return</button>
                </div>
            </form>
        </div>

        <div class="form-container">
            <h2>Cancel Product</h2>
            <form action="/submit-cancel" method="post">
                <div class="form-group">
                    <label for="cancel-order-id">Order ID:</label>
                    <input type="text" id="cancel-order-id" name="order_id" required>
                </div>
                <div class="form-group">
                    <label for="cancel-reason">Reason for Cancellation:</label>
                    <select id="cancel-reason" name="reason" required>
                        <option value="">Select a reason</option>
                        <option value="changed-mind">Changed Mind</option>
                        <option value="found-cheaper">Found Cheaper</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cancel-comments">Additional Comments:</label>
                    <textarea id="cancel-comments" name="comments" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Cancellation</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>