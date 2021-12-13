<?php
include('../config.php');
session_start();

if(isset($_SESSION['admin']))
{
    header("Location: index");
    die();
}
if(isset($_SESSION['user']))
{
    header("Location: ../index.php");
    die();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="keywords" content="Focalyouthtube" />
   <meta name="description" content="Focalyouthtube" />
   <meta name="author" content="Focalyouthtube" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Focalyouthtube</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="../images/favicon.ico">
   <!-- CSS bootstrap-->
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <!--  Style -->
   <link rel="stylesheet" href="../css/style.css" />
   <!--  Responsive -->
   <link rel="stylesheet" href="../css/responsive.css" />
   <link href="../fonts/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
 <section class="position-relative pb-0" style="margin: 50px auto;">
        <div class="gen-login-page-background" style="background:#f5f5f5;"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form class="pms_login form_submit" id="pms_login" name="login_user" method="post">
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">Username or Email Address</label>
                                <input type="text" name="username" id="user_login" class="input" value="" size="20" required>
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" id="user_pass" class="input" value="" size="20" required>
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                            </p>
                            <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect">
                            <a
                                href="index.php">Back to Home</a> |
                            <a
                                href="register.php">Register</a> | <a href="#">Lost your
                                password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include('footer.php');
?>
