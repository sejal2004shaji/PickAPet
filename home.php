<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PICK A PET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<!--  topbar start -->
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Open+Sans:wght@400;700&display=swap');
        
        .site-title {
            font-family: 'Pacifico', cursive;
            font-size: 3rem;
            color: #7Ab730;
            margin: 0;
        }

        .tagline {
            font-family: 'Open Sans', sans-serif;
            font-size: 2rem;
            color: #333;
            margin: 0;
            padding-left: 40px; /* Adds space to the left of the tagline */
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: white;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding:30px 80px;
            position: relative;
        }

        .top-bar .toggle-icon,
        .top-bar .icon {
            cursor: pointer;
        }

        .top-bar .toggle-icon i,
        .top-bar .icon i {
            color: black;
            font-size: 20px;
        }

        .top-bar .toggle-icon:hover i,
        .top-bar .icon:hover i {
            color: #4CAF50;
        }

        .icons {
            display: flex;
            align-items: center;
        }

        .icons .icon {
            margin-left: 30px;
        }

        .logo {
            color: black;
            height: 50px;
            font-size: 30px;
            text-align: right;
        }
      
    </style>
</head>
<body>

<div class="top-bar">
    <div class="toggle-icon" onclick="redirectToToggleCont()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="header">
        <h1 class="site-title">Pick A Pet</h1>
        <p class="tagline">Your Pet, Our Passion</p>
    </div>
    <div class="icons">
        <div class="icon" onclick="redirectTo()">
            <i class="fas fa-search"></i>
        </div>
        <div class="icon" onclick="redirectTocart()">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="icon" onclick="redirectTowish()">
            <i class="fas fa-heart"></i>
        </div>
        <div class="icon" onclick="redirectToPlus()">
            <i class="fas fa-plus"></i>
        </div>
       
    </div>
</div>

<script>
    
        function redirectTocart()
        {
            window.location.href = 'petsy1.php'; 
    }
    function redirectToToggleCont() {
        window.location.href = 'togglecont.php';
    }

    function redirectTo() {
        window.location.href = 'searchbar.php';
    }

    function redirectTowish() {
        window.location.href = 'petsy.php';
    }

    function redirectToPlus() {
        window.location.href = 'imageupload.php'; // Replace 'addpage.php' with your target page
    }
</script>
</body>
</html>
<!--topbar ends-->

     <!-- Navbar Start --><title>Navbar with User Icon</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
         .fa-user-circle {
            font-size: 1.5em;
            color: #4ACF50;
            padding-right: 20px; /* Add padding to the left of the icon */
         }
        .navbar-nav .nav-item .nav-link {
            font-size: 1em; /* Slightly increase the font size of nav links */
        }
        .navbar {
            background-color: white; /* Light grey background */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#.php"><i class="bi bi-arrow-right text-primary me-2"></i>Seller</a>
                        
                    </div> -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Species</a>
                    <div class="dropdown-menu m-0">
                        <a href="petsyCow.php" class="dropdown-item">Cow</a>
                        <a href="petsyDog.php" class="dropdown-item">Dog</a>
                        <a href="petsyRabbit.php" class="dropdown-item">Rabbit</a>
                        <a href="petsyFish.php" class="dropdown-item">Fish</a>
                        <a href="petsyBird.php" class="dropdown-item">Birds</a>
                       <a href="petsyCat.php" class="dropdown-item">Cat</a>
                        

                    </div>
                </div>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="restfed.php" class="nav-item nav-link">Feedback</a>
                <a href="usericoncont.php" class="nav-item nav-link">
                    <i class="far fa-user-circle"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
 <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="header">
    <div class="text-overlay">
        <h1>MAKE YOUR PETS HAPPY</h1>
        <p>"Until one has loved an animal a part of one's soul remains unawakened."</p>
    </div>
    <img src="img/birdgrp.jpg" alt="Bird Group" class="header-img">
</div>
<style>
    .header {
    position: relative;
    text-align: center;
    color: white;
}

.text-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
p {
        color: black;
    }

.header-img {
    width: 100%;
    height: 400px;
    display: block;
}
</style>
    <!-- Hero End -->

   

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase"><u>About Us</u></h6>
                        <h1 class="display-5 text-uppercase mb-0">We Keep Your Pets Happy All Time</h1>
                        <h6 class="text-primary text-uppercase">Aim of petshop is to provide buy and selling of  wide variety of animals all over the world </h6>
                    </div>
                    <h4 class="text-body mb-4">We love pets,and we believe loving pets makes us better people.That's one of the many reasons we do anything for pets -because they will do anything for us.Anything for pets is our commitment to pet parents,its how we do business and who we are as pet lovers.As the leader in pet care,we make our decisions based on how we can bring pet parents closer to their pets. </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
   

    <!-- Footer Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="">Our Office</h6>
                        <span>123 Street,ADOOR</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb+-1">Email Us</h6>
                        <span>ADOOR@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+918569785421</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, ADOOR</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>ADOOR@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+918569785421</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-uppercase border-start border-5 border-primary ps-3 mb-4" >WANT TO WORK WITH US</h1>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="rules.php"><i class="bi bi-arrow-right text-primary me-2"></i>Click here for further details</a>
                        
                    </div>
                    
                </div>
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-12 text-center text-body">
                    <a class="text-body" href="terms&condi.php">Terms & Conditions</a>
                    <span class="mx-1">|</span>
                   <a class="text-body" href="knowabout.php">Contact Us</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="pay&ref.php">Payments</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="logout.php">LogOut</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="privacypoli.php">Privacy Policy</a>
                    <span class="mx-1">|</span>
                   
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>