<!DOCTYPE html>
<html lang="en">
    <head>
        <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NearBy Restaurants LogIn</title>
        <link rel="icon" type="image/png" href="{!!asset('assist/images/Logo%201.png')!!}"/>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{!!asset('assist/css/bootstrap.min.css')!!}">
        <link rel="stylesheet" href="{!!asset('assist/css/all.min.css')!!}">
        <link rel="stylesheet" href="{!!asset('assist/css/index.css')!!}"/>
        <!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>	
    <body>
        <div class="logohead">
            <img src="{!!asset('assist/images/Logo%201.png')!!}"/>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 logstyle">
                    <form method="post" class="form-group" action="#" onsubmit="login();return false;">
                        <h1 class="text-center">LOG IN</h1>
                        <label class="labelcontrol-label" for="Email">E-mail</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="ademail" class="form-control" name="Email" placeholder="Enter Your Email" />
                        </div>
                        <label class="labelcontrol-label" for="Password">Password</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="Password" id="adpass" class="form-control" name="Password" placeholder="Enter Your Password" />
                        </div>
                        <button class="input-q button-fonts btn-lg btn-block" type="submit">Submit</button>
                    </form>
                    <!--<p><span class="or">or</span></p>
                    
                    <form method="post" class="form-group" action="#" onsubmit="login2();return false;">
                        <label class="labelcontrol-label">Phone</label>
                        <div class="input-group" id="forphone">
                            <i class="fas fa-phone"></i>
                            <input type="text" id="adphone" class="form-control" name="Phone" placeholder="Enter Your Phone number" />
                        </div>
                        <button class="input-q button-fonts btn-lg" id="logsub" type="submit">Submit</button>
                        <div style="clear: both"></div>
                    </form>-->
                    <!--<button class="google-signin input-q button-fonts btn-lg btn-block">
                    	<div class="icon">
                            <img src="images/Google.png" />
                    	</div>
                        <span class="google-span" onclick="congo();return false;">Sign in with google</span>		
                    </button>-->
                </div>
            </div>
        </div>
        
        <!--TODO: Add SDKs for Firebase products that you want to use
             https://firebase.google.com/docs/web/setup#available-libraries 
        <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-analytics.js"></script>-->

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
        
        <script src="{!!asset('assist/js/jquery-3.4.1.min.js')!!}"></script>
        <script src="{!!asset('assist/js/bootstrap.min.js')!!}"></script>
        <script src="{!!asset('assist/js/jquery.nicescroll.min.js')!!}"></script>
        <script src="{!!asset('assist/js/index.js')!!}"></script>
    </body>
</html>