<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care Tips</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f9f9f9 50%, #7AB730 50%);
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
           
        }
        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 20px;
            text-align: center;
            
        }
        .card-content h2 {
            font-size: 1.6em;
            margin-bottom: 15px;
            color: #7AB730;
            font-weight: 600;
        }
        .card-content p {
            color: #7f8c8d;
            font-size: 1em;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Pet Care Tips</h1>
    <div class="container">
        <div class="card">
            <img src="img/petcow.jpg" alt="Cow Care">
            <div class="card-content">
                <h2>Cow Care Tips</h2>
                <p>Ensure cows have access to fresh water, nutritious feed, and clean shelter. Regular veterinary check-ups are essential.</p>
            </div>
        </div>
        <div class="card">
            <img src="img/petcat.jpg" alt="Cat Care">
            <div class="card-content">
                <h2>Cat Care Tips</h2>
                <p>Provide your cat with a balanced diet, regular grooming, and a safe environment. Regular vet visits are important.</p>
            </div>
        </div>
        <div class="card">
            <img src="img/petdogs.jpg" alt="Dog Care">
            <div class="card-content">
                <h2>Dog Care Tips</h2>
                <p>Dogs need regular exercise, a healthy diet, and plenty of affection. Keep them up-to-date on vaccinations.</p>
            </div>
        </div>
        <div class="card">
            <img src="img/petbirds.jpg" alt="Bird Care">
            <div class="card-content">
                <h2>Bird Care Tips</h2>
                <p>Provide a spacious cage, fresh water, and a variety of bird-safe foods. Social interaction is key for their well-being.</p>
            </div>
        </div>
        <div class="card">
            <img src="img/petrabbit.jpg" alt="Rabbit Care">
            <div class="card-content">
                <h2>Rabbit Care Tips</h2>
                <p>Rabbits need a large, clean living space, fresh vegetables, and regular veterinary care. Handle them gently.</p>
            </div>
        </div>
        <div class="card">
            <img src="img/petfish.jpg" alt="Fish Care">
            <div class="card-content">
                <h2>Fish Care Tips</h2>
                <p>Maintain clean water, proper filtration, and a balanced diet. Monitor the water temperature and pH levels regularly.</p>
            </div>
        </div>
    </div>
</body>
</html>

