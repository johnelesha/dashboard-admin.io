/*global $, window, firebase*/
var startShow = $("#tbshow"),
    i = 0;

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});

function addDataToTable(doc, i) {
    "use strict";
    var tr = window.document.createElement("tr"),
        th = window.document.createElement("th"),
        td1 = window.document.createElement("td"),
        td2 = window.document.createElement("td"),
        td3 = window.document.createElement("td"),
        td4 = window.document.createElement("td"),
        td5 = window.document.createElement("td");
    th.setAttribute('scope', "row");
    th.textContent = i;
    td1.textContent = doc.data().userName;
    td2.textContent = doc.data().userEMail;
    td3.textContent = doc.data().userPhoneNumber;
    td4.innerHTML = "<button class='input-q button-fonts btn1' data-id='" + doc.id + "'>Owner</button>";
    td5.innerHTML = "<button class='input-q button-fonts btn2' data-id='" + doc.id + "'>User</button>";
    
    tr.append(th);
    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    tr.append(td5);
    startShow.append(tr);
}

firebase.firestore().collection("users").get().then(function (querySnapshot) {
    "use strict";
    querySnapshot.forEach(function (doc) {
        if (doc.data().isRead === false) {
            i += 1;
            addDataToTable(doc, i);
        }
    });
}).catch(function (error) {
    "use strict";
    window.alert("Error getting information: " + error);
});

$("#tbshow").on("click", function (e) {
    "use strict";
    var docID = e.target.getAttribute("data-id");
    if (docID !== null) {
        if (e.target.textContent === "Owner") {
            firebase.firestore().collection("users").doc(docID).update({
                isAdmin: true,
                isRead: true
            }).then(function (doc) {
                window.alert("Updated Successfully");
                window.location.assign("usIdecheersntityck");
            }).catch(function (error) {
                window.alert("Error getting information: " + error);
            });
        } else if (e.target.textContent === "User") {
            firebase.firestore().collection("users").doc(docID).update({
                isAdmin: false,
                isRead: true
            }).then(function (docs) {
                window.alert("Done");
                window.location.assign("usIdecheersntityck");
            }).catch(function (error) {
                window.alert("Error getting information: " + error);
            });
        }
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