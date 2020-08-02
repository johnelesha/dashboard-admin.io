<!DOCTYPE html>
<html lang="en">
	<head>
        <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Dashboard</title>
        <link rel="icon" type="image/png" href="<?php echo asset('assist/images/Logo%201.png'); ?>"/>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo asset('assist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assist/css/all.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assist/css/home.css'); ?>"/>
		<!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
	</head>
    <body>
        <!--Start Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="" id="realhome" ><img src="<?php echo asset('assist/images/Logo%201.png'); ?>" alt="Home" title="home"/></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="signouts" href="" onclick="signout();return false">Signout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--End Navbar-->
        
        <!--Start Dashbord-->
        <section id="secdash">
            <div class="row">
                <div class="col-md-3" id="line">
                    <img src="<?php echo asset('assist/images/AdministratorMale.png'); ?>" id="avatar"/>
                    <h4>Welcome <span id="admname"></span></h4>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="admdatains">Admins</a></li>
                        <li class="list-group-item"><a href="usdaersta">Users</a></li>
                        <li class="list-group-item"><a href="restaownuraersnts">Owners</a></li>
                        <li class="list-group-item"><a href="restadataurants">Restaurants</a></li>
                        <li class="list-group-item"><a href="conmesantactdsages">Messages</a></li>
                    </ul>
                </div>
                <div class="col-md-6 marleft">
                    <ul class="list-group list-group-horizontal jobs">
                        <li class="list-group-item"><a href="dasetocontantfirm">Confirm restaurants</a></li>
                        <li class="list-group-item"><a href="usIdecheersntityck">Check Users</a></li>
                        <!--<li class="list-group-item"><a href="shoanalowysis">Statistic</a></li>-->
                        <li class="list-group-item"><a href="addadmnewinbias">Add Admins</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Dashbord-->
        
        <script>
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
        </script>
        
        <script src="<?php echo asset('assist/js/jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/popper.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/jquery.nicescroll.min.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/home.js'); ?>"></script>
        <script src="<?php echo asset('assist/js/signout.js'); ?>"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\dashbordProject\resources\views/home.blade.php ENDPATH**/ ?>