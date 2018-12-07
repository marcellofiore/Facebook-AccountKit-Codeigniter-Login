<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Special Abo - Step 2</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?php echo site_url() ?>/resource/css/font-awesome.min.css?v=1.0">
	<!-- Css Custom -->
    <link rel="stylesheet" href="<?php echo site_url() ?>/resource/css/landingPageAbo.css?v=0.1.2">
    <!-- Integrate facebook SDK with Locale Language -->
	<?php
	$varFB = trim(Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE'])); // return language from your internet browser
	echo '<script src="https://sdk.accountkit.com/'.$varFB.'/sdk.js"></script>';
	echo '<script src="https://connect.facebook.net/'.$varFB.'/sdk.js"></script>';
	?>

</head>
    <body>
        
        <main>
            <!-- BUTTONS LOGIN -->
                <div class="info-tutorial">
                    <p>Login With Facebook / Account Kit</p>
                </div>
                <div class="container-tutorial more-top-space">
                    <a href="javascript:;" class="bottone-facebook" id="fbLogin" onclick="return false;">Facebook Login</a>
                    <a href="javascript:;" class="bottone-whatsapp" id="smsLogin" onclick="return false;">SMS Login</a>
                </div>

            <!-- log FB Account KIT FORM (this form will be send with JavaScript, more info in resource/js/fbApp.js) -->
            <form action="<?php echo site_url('welcome/account_kit_login') ?>" method="POST" id="my_form">
                <input type="hidden" name="code" id="code">
                <input type="hidden" name="csrf_nonce" id="csrf_nonce">
            </form>
            <!-- lof FB LOGIN FORM (this form will be send with JavaScript, more info in resource/js/fbApp.js)-->
            <form action="<?php echo site_url('welcome/fb_login') ?>" method="POST" id="my_form2">
                <input type="hidden" name="id_fb" id="id_fb">
                <input type="hidden" name="name_fb" id="name_fb">
                <input type="hidden" name="img_fb" id="img_fb">
                <input type="hidden" name="mail_fb" id="mail_fb">
            </form>
        
            
        </main>

        <!-- App FB JS (for request Token / data from Facebook) -->
        <script src="<?php echo site_url() ?>resource/js/fbApp.js"></script>

    </body>
</html>