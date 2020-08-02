/*global window, document, firebase*/
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        
    } else {
        $(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    }
});

function login() {
    "use strict";
    var ademail = document.getElementById("ademail").value,
        adpassword = document.getElementById("adpass").value;
    
    firebase.auth().signInWithEmailAndPassword(ademail, adpassword)
        .then(function () {
            firebase.firestore().collection("admins").get().then(function (querySnapshot) {
                querySnapshot.forEach(function (doc) {
                    if (doc.data().email === ademail && doc.data().password === adpassword) {
                        localStorage.setItem("adminname", doc.data().username);
                        localStorage.setItem("authstate", true);
                        window.location.assign("dashhomesboard");
                    } else {
                        firebase.firestore().collection("users").get().then(function (querySnapshot) {
                            querySnapshot.forEach(function (docs) {
                                if (docs.data().userEMail === ademail && docs.data().userPassword === adpassword) {
                                    localStorage.setItem("authstate", false);
                                    firebase.auth().signOut().then(function () {
                                        window.location.assign("loginingindex");
                                    });
                                }
                            });
                        }).catch(function (error) {
                            window.alert("Error getting information: " + error.message);
                        });
                    }
                });
            }).catch(function (error) {
                window.alert("Error getting information: " + error.message);
            });
        }).catch(function (error) {
            // Handle Errors here.
            window.alert(error.message);
            /*window.location.assign("index.html");*/
        });
    /*docRef.where("email", "==", ademail).where("password", "==", adpassword).get()
        .then(function (querySnapshot) {
            querySnapshot.forEach(function (doc) {
                if (doc.data().email === ademail && doc.data().password === adpassword) {
                    window.location.assign("show.html");
                }
            });
        })
        .catch(function (error) {
            window.alert("Error getting information: ", error);
        });*/
}

if (localStorage.getItem("authstate") == "true") {
    window.alert("You are already logged in.");
    window.location.assign("dashhomesboard");
} else if (localStorage.getItem("authstate") == "false") {
    window.alert("You don't have permission.");
}

// Start nice scroll
$('html').niceScroll({
    cursorcolor: '#3282b8',
    cursorborder: '2px solid #3282b8',
    cursorwidth: 7,
    cursorborderradius: '7px',
    zindex: 9999
});