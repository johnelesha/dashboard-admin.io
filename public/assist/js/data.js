/*global $, window, firebase*/
$('ul.nav-pills li a.nav-link').click(function (e) {
    "use strict";
    e.preventDefault();
});

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});

var startShow = $("#secshow"),
    ownername = "",
    ownerphone = "";

function addDataToTable(doc, ownername, ownerphone) {
    "use strict";
    var ul = window.document.createElement("ul"),
        li1 = window.document.createElement("li"),
        li2 = window.document.createElement("li"),
        li3 = window.document.createElement("li"),
        li4 = window.document.createElement("li"),
        li5 = window.document.createElement("li"),
        a1 = window.document.createElement("a"),
        a2 = window.document.createElement("a"),
        a3 = window.document.createElement("a"),
        a4 = window.document.createElement("a"),
        a5 = window.document.createElement("a");

    ul.setAttribute('class', "nav nav-pills nav-fill");
    li1.setAttribute('class', "nav-item");
    li2.setAttribute('class', "nav-item");
    li3.setAttribute('class', "nav-item");
    li4.setAttribute('class', "nav-item");
    li5.setAttribute('class', "nav-item");

    a1.setAttribute('class', "nav-link");
    a1.setAttribute('data-id', doc.id);
    a1.setAttribute('href', "#");
    a2.setAttribute('class', "nav-link");
    a2.setAttribute('data-id', doc.id);
    a2.setAttribute('href', "#");
    a3.setAttribute('class', "nav-link");
    a3.setAttribute('data-id', doc.id);
    a3.setAttribute('href', "#");
    a4.setAttribute('class', "nav-link");
    a4.setAttribute('data-id', doc.id);
    a4.setAttribute('href', "#");
    a5.setAttribute('class', "nav-link");
    a5.setAttribute('data-id', doc.id);
    a5.setAttribute('href', "#");

    a1.textContent = ownername;
    a2.textContent = ownerphone;
    a3.textContent = doc.data().name;
    a4.textContent = doc.data().restaurantPhone;
    a5.textContent = doc.data().address;
    
    li1.append(a1);
    li2.append(a2);
    li3.append(a3);
    li4.append(a4);
    li5.append(a5);
    ul.append(li1);
    ul.append(li2);
    ul.append(li3);
    ul.append(li4);
    ul.append(li5);
    startShow.append(ul);
}

firebase.firestore().collection("checkrestaurant").get().then(function (querySnapshot) {
    "use strict";
    querySnapshot.forEach(function (doc) {
        if (doc.data().isAccept == false) {
            firebase.firestore().collection("users").doc(doc.data().ownerId).get().then(function(doc2) {
                if (doc.exists) {
                    ownername = doc2.data().userName;
                    ownerphone = doc2.data().userPhoneNumber;
                    addDataToTable(doc, ownername, ownerphone);
                }
            }).catch(function(error) {
                window.console.log(error.message);
            });
        }
    });
}).catch(function (error) {
    "use strict";
    window.alert("Error getting information: " + error);
});

$("#secshow").on("click", function (e) {
    "use strict";
    e.stopPropagation();
    var docID = e.target.getAttribute("data-id");
    if (docID !== null) {
        localStorage.setItem("restaurantID", docID);
        window.location.assign("appresrotauverants");
    }
});

if (localStorage.getItem("authstate") == null) {
    window.location.assign("loginingindex");
}

// Start Scroll to top
$(window).scroll(function () {
    if ($(this).scrollTop() >= 100) {
        $('#goUp').fadeIn(300);
    } else {
        $('#goUp').fadeOut(300);
    }
});

$('#goUp').on('click', function () {
    $('body,html').animate({
        scrollTop : 0
    }, 400);
});

// Start nice scroll
$('html').niceScroll({
    cursorcolor: '#3282b8',
    cursorborder: '2px solid #3282b8',
    cursorwidth: 7,
    cursorborderradius: '7px',
    zindex: 9999
});