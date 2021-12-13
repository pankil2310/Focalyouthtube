<?php
include('../config.php');

$focalyt_url = "https://focalyouthtube.com/";

session_start();
$site_main_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";


if(isset($_SESSION['admin']))
{
    $swl = mysqli_query($connect,"SELECT * FROM `users`");
    while($row = mysqli_fetch_assoc($swl))
    {
        if(md5($row['id']) == $_SESSION['admin'])
        {
            $session_id = $row['id'];
            $session_firstname = $row['first_name'];
            $session_lastname = $row['last_name'];
            $session_proimg = $row['profile_image'];
        }
    }
}
else
{
    header("Location: login.php");
    die();
}
?>
<html><head>
    <title>Dashboard | Focalyouthtube Admin</title>
    <!-- all the meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="" name="description">
<meta content="" name="author">
    <!-- all the css files -->
    <link rel="shortcut icon" href="uploads/system/favicon.png">
<!-- third party css -->
<link href="assets/backend/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/vendor/dropzone.css" rel="stylesheet" type="text/css">
<!-- third party css end -->
<!-- App css -->
<link href="assets/backend/css/app.min.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/icons.min.css" rel="stylesheet" type="text/css">

<link href="assets/backend/css/main.css" rel="stylesheet" type="text/css">

<!-- font awesome 5 -->
<link href="assets/backend/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
<link href="assets/backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/backend/js/onDomChange.js"></script>
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_dialog_advanced{border-radius:8px;padding:10px}.fb_dialog_content{background:#fff;color:#373737}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{left:5px;right:auto;top:5px}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{height:100%;left:0;margin:0;overflow:visible;position:absolute;top:-10000px;transform:none;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{background:none;height:auto;min-height:initial;min-width:initial;width:auto}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{clear:both;color:#fff;display:block;font-size:18px;padding-top:20px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .4);bottom:0;left:0;min-height:100%;position:absolute;right:0;top:0;width:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_mobile .fb_dialog_iframe{position:sticky;top:0}.fb_dialog_content .dialog_header{background:linear-gradient(from(#738aba), to(#2c4987));border-bottom:1px solid;border-color:#043b87;box-shadow:white 0 1px 1px -1px inset;color:#fff;font:bold 14px Helvetica, sans-serif;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:linear-gradient(from(#4267B2), to(#2a4887));background-clip:padding-box;border:1px solid #29487d;border-radius:3px;display:inline-block;line-height:18px;margin-top:3px;max-width:85px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{background:none;border:none;color:#fff;font:bold 12px Helvetica, sans-serif;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #4a4a4a;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f5f6f7;border:1px solid #4a4a4a;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-position:50% 50%;background-repeat:no-repeat;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}
.fb_mpn_mobile_landing_page_slide_out{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_out_from_left{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out_from_left;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_up{animation-duration:500ms;animation-name:fb_mpn_landing_page_slide_up;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_in{animation-duration:300ms;animation-name:fb_mpn_bounce_in;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out{animation-duration:300ms;animation-name:fb_mpn_bounce_out;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out_v2{animation-duration:300ms;animation-name:fb_mpn_fade_out;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_v2{animation-duration:300ms;animation-name:fb_bounce_in_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_from_left{animation-duration:300ms;animation-name:fb_bounce_in_from_left;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_v2{animation-duration:300ms;animation-name:fb_bounce_out_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_from_left{animation-duration:300ms;animation-name:fb_bounce_out_from_left;transition-timing-function:ease-in}.fb_customer_chat_bubble_animated_no_badge{box-shadow:0 3px 12px rgba(0, 0, 0, .15);transition:box-shadow 150ms linear}.fb_customer_chat_bubble_animated_no_badge:hover{box-shadow:0 5px 24px rgba(0, 0, 0, .3)}.fb_customer_chat_bubble_animated_with_badge{box-shadow:-5px 4px 14px rgba(0, 0, 0, .15);transition:box-shadow 150ms linear}.fb_customer_chat_bubble_animated_with_badge:hover{box-shadow:-5px 8px 24px rgba(0, 0, 0, .2)}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_new_ui_mobile_overlay_active{overflow:hidden}@keyframes fb_mpn_landing_page_slide_in{0%{border-radius:50%;margin:0 24px;width:60px}40%{border-radius:18px}100%{margin:0 12px;width:100% - 24px}}@keyframes fb_mpn_landing_page_slide_in_from_left{0%{border-radius:50%;left:12px;margin:0 24px;width:60px}40%{border-radius:18px}100%{left:12px;margin:0 12px;width:100% - 24px}}@keyframes fb_mpn_landing_page_slide_out{0%{margin:0 12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;margin:0 24px;width:60px}}@keyframes fb_mpn_landing_page_slide_out_from_left{0%{left:12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;left:12px;width:60px}}@keyframes fb_mpn_landing_page_slide_up{0%{bottom:0;opacity:0}100%{bottom:24px;opacity:1}}@keyframes fb_mpn_bounce_in{0%{opacity:.5;top:100%}100%{opacity:1;top:0}}@keyframes fb_mpn_fade_out{0%{bottom:30px;opacity:1}100%{bottom:0;opacity:0}}@keyframes fb_mpn_bounce_out{0%{opacity:1;top:0}100%{opacity:.5;top:100%}}@keyframes fb_bounce_in_v2{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}50%{transform:scale(1.03, 1.03);transform-origin:bottom right}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}}@keyframes fb_bounce_in_from_left{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}50%{transform:scale(1.03, 1.03);transform-origin:bottom left}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}}@keyframes fb_bounce_out_v2{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}}@keyframes fb_bounce_out_from_left{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}}@keyframes fb_bounce_out_v2_mobile_chat_started{0%{opacity:1;top:0}100%{opacity:0;top:20px}}@keyframes fb_customer_chat_bubble_bounce_in_animation{0%{bottom:6pt;opacity:0;transform:scale(0, 0);transform-origin:center}70%{bottom:18pt;opacity:1;transform:scale(1.2, 1.2)}100%{transform:scale(1, 1)}}@keyframes slideInFromBottom{0%{opacity:.1;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}@keyframes slideInFromBottomDelay{0%{opacity:0;transform:translateY(100%)}97%{opacity:0;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}</style>

<style type="text/css">
button.btn[data-v-20e3b604]{display:inline-block;font-weight:300;line-height:1.25;text-align:center;white-space:nowrap;vertical-align:middle;user-select:none;border:1px solid transparent;cursor:pointer;letter-spacing:1px;transition:all .15s ease
}
button.btn.btn-sm[data-v-20e3b604]{padding:.4rem .8rem;font-size:.8rem;border-radius:.2rem
}
button.btn.btn-primary[data-v-20e3b604]{color:#fff;background-color:#45C8F1;border-color:#45C8F1
}
button.btn.btn-outline-primary[data-v-20e3b604]{color:#45C8F1;background-color:transparent;border-color:#45C8F1
}
button.btn.btn-danger[data-v-20e3b604]{color:#fff;background-color:#FF4949;border-color:#FF4949
}
.text-muted[data-v-20e3b604]{color:#8492A6
}
.text-center[data-v-20e3b604]{text-align:center
}
.drop-down-enter[data-v-20e3b604],.drop-down-leave-to[data-v-20e3b604]{transform:translateX(0) translateY(-20px);transition-timing-function:cubic-bezier(0.74, 0.04, 0.26, 1.05);opacity:0
}
.drop-down-enter-active[data-v-20e3b604],.drop-down-leave-active[data-v-20e3b604]{transition:all .15s
}
.move-left-enter[data-v-20e3b604],.move-left-leave-to[data-v-20e3b604]{transform:translateY(0) translateX(-80px);transition-timing-function:cubic-bezier(0.74, 0.04, 0.26, 1.05);opacity:0
}
.move-left-enter-active[data-v-20e3b604],.move-left-leave-active[data-v-20e3b604]{transition:all .15s
}
.no-tr[data-v-20e3b604]{transition:none !important
}
.no-tr *[data-v-20e3b604]{transition:none !important
}
.overlay[data-v-20e3b604]{position:fixed;background:rgba(220,220,220,0.8);display:flex;align-items:center;justify-content:center;top:0;left:0;right:0;bottom:0;transition:all 0.2s ease;opacity:0;visibility:hidden
}
.overlay .modal[data-v-20e3b604]{transition:all 0.2s ease;opacity:0;transform:scale(0.6);overflow:hidden
}
.overlay.show[data-v-20e3b604]{opacity:1;visibility:visible
}
.overlay.show .modal[data-v-20e3b604]{opacity:1;transform:scale(1)
}
.panel[data-v-20e3b604]{padding:6px 10px;display:flex;width:100%;box-sizing:border-box;align-items:center;border-radius:4px;position:relative;border:1px solid #eaf7ff;background:#f7fcff;outline:none;transition:all 0.07s ease-in-out
}
.btn[data-v-20e3b604]{cursor:pointer;box-sizing:border-box
}
.light-btn[data-v-20e3b604]{padding:6px 10px;display:flex;width:100%;box-sizing:border-box;align-items:center;border-radius:4px;position:relative;border:1px solid #eaf7ff;background:#f7fcff;outline:none;cursor:pointer;transition:all 0.07s ease-in-out
}
.light-btn[data-v-20e3b604]:hover{background:#e0f4ff;border-color:#8acfff
}
.shake[data-v-20e3b604]{animation:shake-data-v-20e3b604 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;transform:translate3d(0, 0, 0)
}
@keyframes shake-data-v-20e3b604{
10%,90%{transform:translate3d(-1px, 0, 0)
}
20%,80%{transform:translate3d(2px, 0, 0)
}
30%,50%,70%{transform:translate3d(-4px, 0, 0)
}
40%,60%{transform:translate3d(4px, 0, 0)
}
}
.pulse[data-v-20e3b604]{animation:pulse-data-v-20e3b604 2s ease infinite
}
@keyframes pulse-data-v-20e3b604{
0%{opacity:.7
}
50%{opacity:.4
}
100%{opacity:.7
}
}
.flash-once[data-v-20e3b604]{animation:flash-once 3.5s ease 1
}
@keyframes fade-up-data-v-20e3b604{
0%{transform:translate3d(0, 10px, 0);opacity:0
}
100%{transform:translate3d(0, 0, 0);opacity:1
}
}
.fade-in[data-v-20e3b604]{animation:fade-in-data-v-20e3b604 .3s ease-in-out
}
@keyframes fade-in-data-v-20e3b604{
0%{opacity:0
}
100%{opacity:1
}
}
.spin[data-v-20e3b604]{animation-name:spin-data-v-20e3b604;animation-duration:2000ms;animation-iteration-count:infinite;animation-timing-function:linear
}
@keyframes spin-data-v-20e3b604{
from{transform:rotate(0deg)
}
to{transform:rotate(360deg)
}
}
.bounceIn[data-v-20e3b604]{animation-name:bounceIn-data-v-20e3b604;transform-origin:center bottom;animation-duration:1s;animation-fill-mode:both;animation-iteration-count:1
}
@keyframes bounceIn-data-v-20e3b604{
0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215, 0.61, 0.355, 1);transition-timing-function:cubic-bezier(0.215, 0.61, 0.355, 1)
}
0%{opacity:1;-webkit-transform:scale3d(0.8, 0.8, 0.8);transform:scale3d(0.8, 0.8, 0.8)
}
20%{-webkit-transform:scale3d(1.1, 1.1, 1.1);transform:scale3d(1.1, 1.1, 1.1)
}
40%{-webkit-transform:scale3d(0.9, 0.9, 0.9);transform:scale3d(0.9, 0.9, 0.9)
}
60%{opacity:1;-webkit-transform:scale3d(1.03, 1.03, 1.03);transform:scale3d(1.03, 1.03, 1.03)
}
80%{-webkit-transform:scale3d(0.97, 0.97, 0.97);transform:scale3d(0.97, 0.97, 0.97)
}
100%{opacity:1;-webkit-transform:scale3d(1, 1, 1);transform:scale3d(1, 1, 1)
}
}
@keyframes dots-data-v-20e3b604{
0%,20%{color:rgba(0,0,0,0);text-shadow:0.25em 0 0 rgba(0,0,0,0),0.5em 0 0 rgba(0,0,0,0)
}
40%{color:#8492A6;text-shadow:0.25em 0 0 rgba(0,0,0,0),0.5em 0 0 rgba(0,0,0,0)
}
60%{text-shadow:0.25em 0 0 #8492A6,0.5em 0 0 rgba(0,0,0,0)
}
80%,100%{text-shadow:.25em 0 0 #8492A6, .5em 0 0 #8492A6
}
}
@keyframes recording-data-v-20e3b604{
0%{box-shadow:0px 0px 5px 0px rgba(173,0,0,0.3)
}
65%{box-shadow:0px 0px 5px 5px rgba(173,0,0,0.3)
}
90%{box-shadow:0px 0px 5px 5px rgba(173,0,0,0)
}
}
body[data-v-20e3b604]{margin:0;font-size:100%;color:#3C4858
}
a[data-v-20e3b604]{text-decoration:none;color:#45C8F1
}
h1[data-v-20e3b604],h2[data-v-20e3b604],h3[data-v-20e3b604],h4[data-v-20e3b604]{margin-top:0
}
svg[data-v-20e3b604]{outline:none
}
.container_selected_area[data-v-20e3b604]{display:none;visibility:hidden;padding:0;position:fixed;top:0;left:0;right:0;bottom:0;z-index:2147483647
}
.container_selected_area.active[data-v-20e3b604]{visibility:visible;display:block
}
.container_selected_area .label[data-v-20e3b604]{font-family:"Didact Gothic Regular",sans-serif;font-size:22px;text-align:center;padding-top:15px
}
.container_selected_area .area[data-v-20e3b604]{display:none;position:fixed;z-index:2147483647;border:1px solid #1e83ff;background:rgba(30,131,255,0.1);box-sizing:border-box
}
.container_selected_area .area.active[data-v-20e3b604]{display:block;top:0;left:0
}
.hide[data-v-20e3b604]{display:none
}
</style>

</head>
<body data-layout="detached">


    <!-- HEADER -->
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark" style="background:#fff !important">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="index" class="topnav-logo" style="min-width: unset;    padding-top: 15px;">
            <span class="topnav-logo-lg">
                <img src="uploads/system/logo-light.png" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="uploads/system/logo-light.png"  style="width: 80px;height: 40;">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
          <!--  <li class="dropdown notification-list" style="    padding-top: 15px;">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-view-apps noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                    <div class="rounded-top py-3 border-bottom bg-primary">
                        <h4 class="text-center text-white">Quick actions</h4>
                    </div>

                    <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                       
                        <div class="col-6 p-0 border-bottom border-right">
                            <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('modal/popup/add_course_shortcut', 'Create course')">
                                <i class="dripicons-archive text-20"></i>
                                <span class="w-100 d-block text-muted">Add course</span>
                            </a>
                        </div>

                        <div class="col-6 p-0 border-bottom">
                            <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('modal/popup/lesson_types/add_shortcut_lesson', 'Add new lesson')">
                                <i class="dripicons-media-next text-20"></i>
                                <span class="d-block text-muted">Add lesson</span>
                            </a>
                        </div>

                            <div class="col-6 p-0 border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('modal/popup/shortcut_add_student', 'Add student')">
                                    <i class="dripicons-user text-20"></i>
                                    <span class="w-100 d-block text-muted">Add student</span>
                                </a>
                            </div>

                            <div class="col-6 p-0">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('modal/popup/shortcut_enrol_student', 'Enrol a student')">
                                    <i class="dripicons-network-3 text-20"></i>
                                    <span class="d-block text-muted">Enrol student</span>
                                </a>
                            </div>
                    </div>
                </div>  
            </li> -->
            <li class="notification-list">
            <a class="button-menu-mobile disable-btn">
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
</a>
</li>
            <li class="notification-list">
            <div class="visit_website">
    <a href="<?=$site_main_url?>" target="_blank" class="btn btn-outline-light" style="background:#1261a0"> Visit website</a>
</div>
            </li>
            <li class="dropdown notification-list" >
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="background:#1261a0">
                <span class="account-user-avatar">
                <?php
                if($session_proimg != '')
                {
                ?>
                    <img src="../<?=$session_proimg?>" alt="user-image" class="rounded-circle">
                <?php
                }
                else
                {
                ?>
                    <img src="uploads/user_image/placeholder.png" alt="user-image" class="rounded-circle">
                <?php
                }
                ?>
                </span>
                <span style="color: #fff;">
                                        <span class="account-user-name"><?=$session_firstname?> <?=$session_lastname?></span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- Account --> 
            <a href="manage_profile.php" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle mr-1"></i>
                <span>My account</span>
            </a>

                            <!-- settings-->
       <!--         <a href="#" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings mr-1"></i>
                    <span>Settings</span>
                </a>-->

            
            <!-- Logout-->
            <a href="logout.php" onclick="return confirm('Are you sure you want to Logout now?')" class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span>Logout</span>
            </a>

        </div>
    </li>

</ul>


</div>
</div>
<!-- end Topbar --> 

<div class="container-fluid">
        <div class="wrapper">
<?php
include('sidebar.php');
?>
