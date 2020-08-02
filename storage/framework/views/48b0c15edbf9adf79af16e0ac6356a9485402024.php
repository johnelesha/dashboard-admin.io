<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Confirm Restaurants</title>
        <link rel="icon" type="image/png" href="<?php echo asset('assist/images/Logo%201.png'); ?>"/>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo asset('assist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assist/css/all.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assist/css/data.css'); ?>"/>
        <!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
	</head>
    <body>
        <!--Start Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark nav-justified">
            <a class="navbar-brand" href="dashhomesboard"><img src="<?php echo asset('assist/images/Logo%201.png'); ?>" alt="Home" title="home"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="adminlink" href="admdatains">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="userlink" href="usdaersta">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ownerlink" href="restaownuraersnts">Owners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="restaurantlink" href="restadataurants">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="messagelink" href="conmesantactdsages">Messages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item active" id="signups" href="addadmnewinbias">Signup</a>
                            <a class="dropdown-item" id="signouts" href="" onclick="signout();return false">Signout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Start Show -->
        <section id="secshow" class="">
            <!-- <ul class="nav nav-pills nav-fill">
                <li class="nav-item"><a class="nav-link" href="#">KFC</a></li>
                <li class="nav-item"><a class="nav-link" href="#">19015</a></li>
                <li class="nav-item"><a class="nav-link" href="#">01062232556</a></li>
                <li class="nav-item"><a class="nav-link" href="#">ElNile</a></li>
                <li class="nav-item"><a class="nav-link" href="#">AliMohamed</a></li>
            </ul> -->
        </section>
        <!-- End Show -->
        
        <button id="goUp"><i class="fas fa-chevron-up fa-2x" aria-hidden="true"></i></button>
        
        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyAEluiTZW6QRLhP7tYa3KTR0NC54w5nYv0",
                authDomain: "pro-db-1.firebaseapp.com",
                databaseURL: "https://pro-db-1.firebaseio.com",
                projectId: "pro-db-1",
                storageBucket: "pro-db-1.appspot.com",
                messagingSenderId: "350598462471",
                appId: "1:350598462471:web:6dbaf59a3510475b937ea2",
                measurementId: "G-3V9V7MTPES"
            };
            
            firebase.initializeApp(firebaseConfig);
            //firebase.analytics();
        </script>

        <script src="<?php echo asset('assist/js/jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/popper.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/jquery.nicescroll.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/data.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/signout.js'); ?>"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\dashbordProject\resources\views/data.blade.php ENDPATH**/ ?>