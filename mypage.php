<!-- home.php -->
<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: login1.php'); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .user-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <button class="btn" id="showUserDataBtn">Show User Data</button>
    <table class="user-table" id="userDataTable" style="display: none;">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody id="userDataBody">
            <!-- Data will be dynamically inserted here -->
        </tbody>
    </table>

    <script>
        document.getElementById('showUserDataBtn').addEventListener('click', function() {
            // Create an AJAX request to fetch the user data
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_user_data.php', true);
            xhr.onload = function() {
                if (this.status === 200) {
                    var data = JSON.parse(this.responseText); // Parse JSON data
                    var tableBody = document.getElementById('userDataBody');
                    tableBody.innerHTML = ''; // Clear any existing rows

                    // Check if data was successfully retrieved
                    if (data.length > 0) {
                        data.forEach(function(user) {
                            var row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${user.username}</td>
                                <td>${user.email}</td>
                                <td>${user.phone_no}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                        document.getElementById('userDataTable').style.display = 'table';
                    } else {
                        alert('No user data found.');
                    }
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
