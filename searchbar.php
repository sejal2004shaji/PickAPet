<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: white;/* Soft gradient full background */
            color: #333;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .search-container {
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent white */
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
            border-radius: 0 0 10px 10px;
            backdrop-filter: blur(5px); /* Blurs the background behind the search bar */
        }

        .search-container i {
            font-size: 20px;
            color: #333;
            margin-right: 10px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .search-container i:hover {
            color: green;
        }

        .search-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-container input:focus {
            border-color: green;
            box-shadow: 0 0 5px rgba(0, 128, 0, 0.5);
        }

        .content {
            padding: 20px;
            flex: 1; /* Allows the content to fill the remaining space */
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0 10px;
            color: #4CAF50;
        }

        .search-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .search-item:hover {
            background-color: #e0f7fa;
            transform: translateY(-3px);
        }

        .search-item i {
            font-size: 18px;
            color: #4CAF50;
            margin-right: 15px;
        }

        .search-item p {
            margin: 0;
            font-size: 16px;
            flex: 1;
        }

        .search-item a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="search-container">
    <i class="fas fa-arrow-left" id="backButton"></i>
    <input type="text" id="searchInput" class="form-control me-2" placeholder="Search for...">
    <i class="fas fa-search search-icon" id="searchButton"></i>
</div>

<div class="content">
    <div class="section-title">Your past searches</div>
    <div class="search-item">
        <i class="fas fa-hospital"></i>
        <a href="vethos.php">
            <p>Veterinary Hospitals</p>
        </a>
    </div>

    <div class="section-title">Most searched</div>
    <div class="search-item">
        <i class="fas fa-cat"></i>
        <a href="petsycat.php">
            <p>Cat</p>
        </a>
    </div>
    <div class="search-item">
        <i class="fas fa-dog"></i>
        <a href="petsydog.php">
            <p>Dog</p>
        </a>
    </div>
    <div class="search-item">
        <i class="fas fa-hospital"></i>
        <a href="petsycow.php">
            <p>Cow</p>
        </a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    function handleSearch() {
        var query = document.getElementById('searchInput').value.trim().toLowerCase();

        switch (query) {
            case 'veterinary hospitals':
                window.location.href = 'vethos.php';
                break;
            case 'cat':
                window.location.href = 'petsycat.php';
                break;
            case 'dog':
                window.location.href = 'petsydog.php';
                break;
            case 'fish':
                window.location.href = 'petsyfish.php';
                break;
            case 'cow':
                window.location.href = 'petsycow.php';
                break;
            default:
                alert('No matching results found.');
        }
    }

    document.getElementById('searchButton').addEventListener('click', handleSearch);

    document.getElementById('searchInput').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            handleSearch();
        }
    });

    document.getElementById('backButton').addEventListener('click', function () {
        window.location.href = 'home.php';
    });
</script>

</body>
</html>