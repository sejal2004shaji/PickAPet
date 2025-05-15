<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column; /* Ensure flex-direction is column to stack header and content */
      align-items: center;
      justify-content: center; /* Center vertically */
      background: url('fishimg/000.jpeg') no-repeat center center fixed;
      background-size: cover;
      color: white;
      font-family: Arial, sans-serif;
    }

    header {
      width: 100%;
      padding: 20px; /* Adjust padding as needed */
      display: flex;
      justify-content: flex-start; /* Align items to the left */
      align-items: center;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1;
    }

    .button-container {
      display: flex;
      gap: 20px;
      margin-left: 755px; /* Adjust left margin for spacing */
    }

    button {
      padding: 10px 30px;
      font-size: 25px;
      cursor: pointer;
      border: none;
      background-color:chocolate;
      border-radius: 5px;
      
      color: white;
      transition: background-color 0.3s ease-in-out;
    }

    button:hover {
      background-color: #7AB730;
    }

    .welcome-container {
      text-align: center;
      animation: fadeIn 2s ease-in-out;
      margin-top: 100px; /* Adjust margin-top to avoid overlap with header */
    }

    h1 {
      margin: 0;
      font-size: 3rem;
    }
  </style>
</head>
<body>
  <header>
    <!-- Example header content -->
    
    <div class="button-container">
      <button id="adminButton">Admin</button>
      <button id="userButton">User</button>
      <button id="staffButton">Staff</button>
      <button id="sellerButton">Seller</button>
    </div>
  </header>
  <div class="welcome-container">
    <h1>PICK A PET</h1>
  </div>
  <script>
    document.getElementById('adminButton').addEventListener('click', function() {
      window.location.href = 'admreg.php';
    });
    document.getElementById('userButton').addEventListener('click', function() {
      window.location.href = 'login1.php';
    });
    document.getElementById('staffButton').addEventListener('click', function() {
      window.location.href = 'staffform.php';
    });
    document.getElementById('sellerButton').addEventListener('click', function() {
      window.location.href = 'sellog.php';
    });

  </script>
</body>
</html>