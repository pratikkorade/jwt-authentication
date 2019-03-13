
//    alert(appId);
//load fb sdk
(
    function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
(document, 'script', 'facebook-jssdk')
    );
window.fbAsyncInit = function () {
FB.init({
    appId: '2258806847771657',
    cookie: true, // enable cookies to allow the server to access the session
    xfbml: true, // parse social plugins on this page
    version: 'v2.5' // use graph api version 2.5
});
};
function fbLogin() {
FB.login(function (response) {
    if (response.authResponse) {
        toastrNotification('Please wait few seconds to login', 'success');
        var facebook_token = response.authResponse.accessToken; //get access token
        var facebook_id = response.authResponse.userID; //get uid

        FB.api("/" + facebook_id, {fields: ['birthday', 'email', 'gender', 'first_name', 'last_name']}, function (userInfo) {
            var jsonData = {
                "first_name": userInfo.first_name,
                "last_name": userInfo.last_name,
                "email": userInfo.email,
                "gender": userInfo.gender ? userInfo.gender : 'male',
                "dob": userInfo.birthday,
                "facebook_id": facebook_id,
                "facebook_token": facebook_token
            };
            if (!userInfo.email) {
                toastrNotification('Failed to get email from facebook, Please login using form', 'error');
                return false;
            }
            ajaxRequest(jsonData);
        });
    } else {
        toastrNotification('Failed to login', 'error');
    }
}, {scope: 'email,user_birthday'})
}



//load google plus
(function () {
var po = document.createElement('script');
po.type = 'text/javascript';
po.async = true;
po.src = 'https://apis.google.com/js/client:plusone.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(po, s);
})();
function onLoadCallback() {
gapi.auth.checkSessionState({
    client_id:'469707559402-52lvoielarr6rgr810svlsna3gke5veu.apps.googleusercontent.com'}, googleSessionStatus);
}
gp_login = function () {
var myParams = {
    'clientid': '469707559402-52lvoielarr6rgr810svlsna3gke5veu.apps.googleusercontent.com', //You need to set client id
    'cookiepolicy': 'single_host_origin',
    'callback': 'gploginCallback', //callback function
    'approvalprompt': 'force',
    'scope': 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email'
};
gapi.auth.signIn(myParams);
}
function gploginCallback(result) {
    console.log(result);
if (result['status']['signed_in']) {
    console.log('Please wait few seconds to login', 'success');
    var google_token = result.access_token;
    gapi.auth.checkSessionState({client_id: '469707559402-52lvoielarr6rgr810svlsna3gke5veu.apps.googleusercontent.com'}, true);
    console.log(google_token);
    getGoogleInfo(google_token);
} else {
    console.log('Failed to login', 'error');
}
}
function getGoogleInfo(google_token) {
    console.log(google_token);
gapi.client.load('plus', 'v1', function () {
    var request = gapi.client.plus.people.get({
        'userId': 'me'
    });
    request.execute(function (resp) {
        var google_id = resp.id;
        var json = {
            "first_name": resp.name.givenName,
            "last_name": resp.name.familyName,
            "email": '',
            "gender": resp.gender ? resp.gender : 'male',
            "google_id": google_id,
            "google_token": google_token
        }
        for (var i = 0; i < resp.emails.length; i++) {
            if (resp.emails[i].type === 'account') {
                json.email = resp.emails[i].value;
                break;
            }
        }
        if (json.email == '') {
            console.log('Failed to get email from google, Please login using form', 'error');
            return false;
        }

        ajaxRequest(json);
    });
});
}

function ajaxRequest(jsonData) {
$.ajax({
    method: "POST",
    url: '/social',
    data: jsonData 
})
        .done(function (data) {
            if (data) {
                location.reload();
            } else {
                console.log('Failed to login', 'error');
            }
        })
        .fail(function (error) {
            console.log(error, 'error');
        });
}