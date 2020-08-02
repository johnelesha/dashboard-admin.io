/*global window, firebase*/
function signout() {
    "use strict";
    firebase.auth().signOut().then(function () {
        // Sign-out successful.
        localStorage.removeItem("adminname");
        localStorage.removeItem("authstate");
        window.location.assign("loginingindex");
    }).catch(function (error) {
        // An error happened.
        window.alert(error);
    });
}