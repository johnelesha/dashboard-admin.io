/*global $, window, firebase*/
$('#realhome').click(function (e) {
    "use strict";
    e.preventDefault();
});

var list = $(".list-group-horizontal .list-group-item:nth-of-type(1)"),
    list2 = $(".list-group-horizontal .list-group-item:nth-of-type(2)"),
    i = 0,
    k = 0;

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        window.document.getElementById("admname").innerHTML = localStorage.getItem("adminname");
        $(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});
      
function showCount(j) {
    "use strict";
    var span = window.document.createElement("span");
    span.setAttribute('id', "counter");
    if (j > 0) {
        span.textContent = j;
        list.append(span);
    } else {
        window.console.log("No new request for retaurants.");
    }
}

firebase.firestore().collection("checkrestaurant").get().then(function (querySnapshot) {
    "use strict";
    querySnapshot.forEach(function (doc) {
        if (doc.data().isAccept === false) {
            i += 1;
        }
    });
    showCount(i);
}).catch(function (error) {
    "use strict";
    window.alert("Error getting information: " + error);
});

function showCount2(p) {
    "use strict";
    var span = window.document.createElement("span");
    span.setAttribute('id', "counter");
    if (p > 0) {
        span.textContent = p;
        list2.append(span);
    } else {
        window.console.log("No new request for users.");
    }
}

firebase.firestore().collection("users").get().then(function (querySnapshot) {
    "use strict";
    querySnapshot.forEach(function (docs) {
        if (docs.data().isRead === false) {
            k += 1;
        }
    });
    showCount2(k);
}).catch(function (error) {
    "use strict";
    window.alert("Error getting information: " + error);
});

if (localStorage.getItem("authstate") == null) {
    window.location.assign("loginingindex");
}

var wh = $(window).height(),
    navh = $('.navbar').innerHeight();
$('#line').height(wh - navh);

// Start nice scroll
$('html').niceScroll({
    cursorcolor: '#3282b8',
    cursorborder: '2px solid #3282b8',
    cursorwidth: 7,
    cursorborderradius: '7px',
    zindex: 9999
});