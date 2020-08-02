<!DOCTYPE html>
<html lang="en">
	<head>
        <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Confirm Restaurant</title>
        <link rel="icon" type="image/png" href="{!!asset('assist/images/Logo%201.png')!!}"/>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{!!asset('assist/css/bootstrap.min.css')!!}">
        <link rel="stylesheet" href="{!!asset('assist/css/all.min.css')!!}">
		<link rel="stylesheet" href="{!!asset('assist/css/showdata.css')!!}"/>
		<!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            #map {
                height: 600px;
                width: 90%;
                margin-left: 5%;
                margin-bottom: 30px
            }
        </style>
	</head>
    <body>
        <!--Start Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark nav-justified">
            <a class="navbar-brand" href="dashhomesboard"><img src="{!!asset('assist/images/Logo%201.png')!!}" alt="Home" title="home"/></a>
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
        <!--End Navbar-->
        
        <!--Start Show Data-->
        <table class="table table-striped table-hover table-responsive-sm" style="text-align: center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Types</th>
                    <th scope="col">Location</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="tbshow">
                <!-- <tr>
                    <td>KFC</td>
                    <td>19015</td>
                    <td>Chicken</td>
                    <td>ElNile</td>
                    <td><button class="input-q button-fonts" type="submit">Confirm</button></td>
                    <td><button class="input-q button-fonts" type="submit">Reject</button></td>
                </tr> -->
            </tbody>
        </table>
        <!--End Show Data-->
         
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
        
        <script src="{!!asset('assist/js/jquery-3.4.1.min.js')!!}"></script>
        <script src="{!!asset('assist/js/popper.min.js')!!}"></script>
        <script src="{!!asset('assist/js/bootstrap.min.js')!!}"></script>
        <script src="{!!asset('assist/js/jquery.nicescroll.min.js')!!}"></script>
        <script src="{!!asset('assist/js/confirmrest.js')!!}"></script>
        <script src="{!!asset('assist/js/signout.js')!!}"></script>

        <div id="map"></div>
        <script>
          // Note: This example requires that you consent to location sharing when
          // prompted by your browser. If you see the error "The Geolocation service
          // failed.", it means you probably did not give permission for the browser to
          // locate you.		
            var map, infoWindow,
                latit = Number(localStorage.getItem("latitude")),
                longit = Number(localStorage.getItem("longitude"));

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 16
                });

            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: latit,
                    lng: longit
                };

                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'Restaurant Location'
                    });

                    infoWindow.setPosition(pos);
                    map.setCenter(pos);
                }, 
                    function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
                }
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                      'Error: The Geolocation service failed.' :
                      'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
            }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiL7I4MYHz39r07zbzA8AvDhLQz98fJkY&callback=initMap">
        </script>
    </body>
</html>