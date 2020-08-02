firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});

var startShow = $("#tbshow"),
    idDoc = localStorage.getItem("restaurantID");

function addDataToTable(doc) {
    "use strict";
    var tr = window.document.createElement("tr"),
        td1 = window.document.createElement("td"),
        td2 = window.document.createElement("td"),
        td3 = window.document.createElement("td"),
        td4 = window.document.createElement("td"),
        td5 = window.document.createElement("td"),
        td6 = window.document.createElement("td");

    td1.textContent = doc.data().name;
    td2.textContent = doc.data().restaurantPhone;
    td3.textContent = doc.data().types;
    td4.textContent = doc.data().address;
    td5.innerHTML = "<button class='input-q button-fonts' data-id='" + doc.id + "'>Confirm</button>";
    td6.innerHTML = "<button class='input-q button-fonts' data-id='" + doc.id + "'>Reject</button>";
    
    localStorage.setItem("latitude", doc.data().location.latitude);
    localStorage.setItem("longitude", doc.data().location.longitude);

    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    tr.append(td5);
    tr.append(td6);
    startShow.append(tr);
}

firebase.firestore().collection("checkrestaurant").doc(idDoc).get().then(function (doc) {
    "use strict";
    if (doc.exists) {
        addDataToTable(doc);
    }
}).catch(function (error) {
    "use strict";
    window.alert("Error getting information: " + error);
});

$("#tbshow").on("click", function (e) {
    "use strict";
    var docID = e.target.getAttribute("data-id");
    if (docID !== null) {
        if (e.target.textContent === "Confirm") {
            firebase.firestore().collection("checkrestaurant").doc(docID).update({
                isAccept: true
            }).then(function (doc) {
                localStorage.removeItem("restaurantID");
                localStorage.removeItem("latitude");
                localStorage.removeItem("longitude");
                window.alert("Accepted");
                window.location.assign("dasetocontantfirm");
            }).catch(function (error) {
                window.alert("Error getting information: " + error);
            });
        } else if (e.target.textContent === "Reject") {
            firebase.firestore().collection("checkrestaurant").doc(docID).delete().then(function () {
                localStorage.removeItem("restaurantID");
                localStorage.removeItem("latitude");
                localStorage.removeItem("longitude");
                window.alert("Rejected");
                window.location.assign("dasetocontantfirm");
            }).catch(function (error) {
                window.alert("Error getting information: " + error);
            });
        }
    }
});

if (localStorage.getItem("authstate") == null) {
    window.location.assign("loginingindex");
}

// Start nice scroll
$('html').niceScroll({
    cursorcolor: '#3282b8',
    cursorborder: '2px solid #3282b8',
    cursorwidth: 7,
    cursorborderradius: '7px',
    zindex: 9999
});