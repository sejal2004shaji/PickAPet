<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resume and License</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <button class="back-button" onclick="history.back()">
        <i class="fas fa-arrow-left"></i>
    </button>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5" data-aos="fade-up">
                    <div class="card-body">
                        <h3 class="card-title text-center">Upload Resume and License</h3>
                        <form action="pending.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Upload Resume</label>
                                <input type="file" class="form-control" id="resume" name="resume" required>
                            </div>
                            <div class="mb-3">
                                <label for="license_image" class="form-label">Upload License Image (PNG or JPG)</label>
                                <input type="file" class="form-control" id="license_image" name="license_image" accept="image/png, image/jpeg" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Alegreya',serif;
            background-image: url('background5.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
            position: relative;
            width: 500px;
            height: 500px;
            margin: 50px auto;
        }

        .back-button {
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            left: 20px;
            transition: background-color 0.3s;
        }

        .back-button i {
            font-size: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
