<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        .terms {
            margin-top: 20px;
        }
        .checkbox-container {
            margin-top: 20px;
        }
        .checkbox-container input {
            margin-right: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .footer button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
    <script>
        function checkTerms() {
            var checkBox1 = document.getElementById("terms1");
            var checkBox2 = document.getElementById("terms2");
            var okButton = document.getElementById("okButton");
            okButton.disabled = !(checkBox1.checked && checkBox2.checked);
        }

        function redirectIfChecked() {
            window.location.href = "submit_application.php";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <h2>Working Rules</h2>
        <p>Here are the working rules:</p>
        <ul>
            <li>Maintain punctuality and professionalism at all times.</li>
            <li>Adhere to the company's code of conduct.</li>
            <li>Complete all assigned tasks efficiently.</li>
            <li>Driving License for LMV and MVWG is mandatory.</li>
        </ul>
        <div class="terms">
            <div class="checkbox-container">
                <input type="checkbox" id="terms1" onclick="checkTerms()">
                <label for="terms1">I accept the working rules</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" id="terms2" onclick="checkTerms()">
                <label for="terms2">I confirm that I have a Driving License for LMV and MVWG</label>
            </div>
        </div>
        <div class="footer">
            <button id="okButton" onclick="redirectIfChecked()" disabled>OK</button>
        </div>
    </div>
</body>
</html>
