window.onload = function() {
    "use strict";

    /* INIZIALIZE ACCOUNT KIT */
    AccountKit.init({
        appId: "YOUR APP ID", // facebook App ID         
        state: "CustomAppState", // as you like
        version: "v1.1", // Account Kit API Version (guarda in Account Kit - Settings)
        fbAppEventsEnabled:true
    });

    /* initialize Facebook SDK LOGIN */
    FB.init({
        appId      : 'YOUR APP ID', // facebook APP ID
        cookie     : true,  // enable cookies to allow the server to access 
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
    });

    var btnFbLogin = document.getElementById('fbLogin'); // Facebook button login
    var btnSMS = document.getElementById('smsLogin'); // AccountKit button (sms login / whatsapp)

    // login Account Kit callback (SMS)
    function loginCallback(response) {
        //console.log("LOADING CALL BACK");
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            // Set data on FORM, and send Form with JavaScript
            document.getElementById("code").value = response.code;
            document.getElementById("csrf_nonce").value = response.state;
            document.getElementById("my_form").submit(); // Send Form with ID my_form
        }
        else if (response.status === "NOT_AUTHENTICATED") {
            // handle authentication failure
            console.log("Authentication failure");
        }
        else if (response.status === "BAD_PARAMS") {
            // handle bad parameters
            console.log("Bad parameters");
        }
    }

    // phone form submission handler
    function phone_btn_onclick() {
        //console.log("Login With SMS cliccked");
        // you can add countryCode and phoneNumber to set values
        AccountKit.login('PHONE', {}, loginCallback); // will use default values if this is not specified
    }
    
    btnSMS.addEventListener('click', phone_btn_onclick); // add listner al bottone login with sms
    /* END Account Kit Functions */

    /* Functions FB LOGIN */
    function login() {
        //console.log("Button FB Login clicked");
        FB.login(function(response) {
            //console.log("LOGIN USER... ")
            //console.log(response);
            statusChangeCallback(response);
        }, { scope: 'public_profile,email' }); // Setting Data Request from User on FACEBOOK Example => public_profile, email address => https://developers.facebook.com/docs/javascript/reference/FB.api/
    }

    function statusChangeCallback(response) {
        //console.log('statusChangeCallback FB Login');
        /*
        console.log(response);
        console.log("TOKEN: " + response.authResponse.accessToken);
        */
        if (response.status === 'connected') {
          // Logged into your app and Facebook.
          getInfoAPI();
        } else {
          // The person is not logged into your app or we are unable to tell.
          console.log('Please log into this app. - NOT CONNECTED')
        }
    }

    // Request Data from USer (API Facebook)
    function getInfoAPI() {
        //console.log('Welcome!  Fetching your information.... ');
        // Setting Data Request on Facebook, for more info documentation => https://developers.facebook.com/docs/javascript/reference/FB.api/
        FB.api('/me',{ fields: 'id, name, email' }, function(response) {
            //console.log("RISPOSTA STATUS: ");
            //console.log(response);
            //console.log('Successful login for: ' + response.name);
            //console.log('USER ID facebook: ' + response.id);
            // Sed data on Form and Submit this with JS
            document.getElementById("id_fb").value = response.id;
            document.getElementById("name_fb").value = response.name;
            document.getElementById("img_fb").value = "https://graph.facebook.com/"+response.id+"/picture?type=large";
            // FB Type IMAGE => https://stackoverflow.com/questions/11442442/get-user-profile-picture-by-id
            document.getElementById("mail_fb").value = response.email;
            document.getElementById("my_form2").submit(); // Send FORM with id my_form2

        });
    }
    
    btnFbLogin.addEventListener('click', login);
    /* END FB LOGIN */

};