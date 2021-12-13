<?php
include('config.php');

session_start();
$focalyt_url = "";
  $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if(isset($_SESSION['user']))
{
    $swl = mysqli_query($connect,"SELECT * FROM `users`");
    while($row = mysqli_fetch_assoc($swl))
    {
        if(md5($row['id']) == $_SESSION['user'])
        {
            $session_id = $row['id'];
            $user_email = $row['user_email'];
            $user_phone = $row['user_phone'];
            $user_gender = $row['gender'];
            $user_dob = $row['date_of_birth'];
            $user_city = $row['city'];
            $user_state = $row['state'];
            $user_zip = $row['zip'];
            $session_firstname = $row['first_name'];
            $session_lastname = $row['last_name'];
            $session_proimg = $row['profile_image'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="keywords" content="Focalyouthtube" />
   <meta name="description" content="Focalyouthtube" />
   <meta name="author" content="Focalyouthtube" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
       <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>Focalyouthtube</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico">
   <!-- CSS bootstrap-->
   <?php
   if(!isset($_SESSION['user']))
    {
    ?>
        <meta http-equiv="refresh" content="180;https://www.focalyouthtube.com/login.php" />
   <?php
   }
   else
   {
       ?>
       <meta http-equiv="refresh" content="300;https://www.focalyouthtube.com/subscribe_plan.php" />
       <?php
   }
   ?>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!--  Style -->
   <link rel="stylesheet" href="css/style.css" />
   <link rel="manifest" href="/manifest.json" />
   <!--  Responsive -->
   <link rel="stylesheet" href="css/responsive.css" />
   <link href="fonts/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-14X653TKDH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-14X653TKDH');
</script>
</head>

<body>



   <!--=========== Loader =============-->
   <div id="gen-loading" style="    z-index: 99999999;">
      <div id="gen-loading-center">
         <img src="images/logo-1.png" alt="loading">
      </div>
   </div> 
   <!--=========== Loader =============-->

   <!--========== Header ==============-->
 
   <!--========== Header ==============-->



  <!-- <div class="sidebar sidebar-left-nav" style="z-index: 1000;top: 90px;box-shadow:rgb(204 204 204) 3px 3px 15px 0px;">
   <a href="index.php" class="anc"><i class="fas fa-home"></i><span>Home</span></a>
   <a href="#" class="anc"><i class="fas fa-user-graduate"></i> <span>Students</span></a>
   <a href="#" class="anc"><i class="fas fa-university"></i> <span>Institutes</span></a>
   <a href="#" class="anc"><i class="fas fa-users"></i> <span>Corporates</span></a>
  <a class="anc" href="#"><i class="fas fa-book-open"></i> <span>Content Partners</span></a>
  <a href="subscribe_plan.php" class="anc"><i class="fas fa-history"></i> <span>Plans</span></a>
  <?php
  if($session_id != "")
  {
      ?>
      <a href="manage_subscription.php" class="anc"><i class="fas fa-history"></i> <span>My Subscriptions</span></a>
      <?php
  }
  ?>
  
  <a href="history_video.php" class="anc"><i class="fas fa-history"></i> <span>History</span></a>
  <a href="liked_videos.php" class="anc"><i class="fas fa-thumbs-up"></i> <span>Liked videos</span></a>
  <a href="favourites_videos.php" class="anc"><i class="fas fa-heart"></i> <span>Favourite videos</span></a>
  <a href="manage_profile.php" class="anc"><i class="fas fa-cogs"></i> <span>Settings</span></a>
  <a href="about_us.php" class="anc"><i class="fas fa-info"></i>     <span>About Us</span></a> 
  <a href="privacy_policy.php" class="anc"><i class="fas fa-lock"></i>     <span>Privacy Policy</span></a>
  <a href="terms_and_condition.php" class="anc"><i class="fas fa-clipboard"></i>     <span>Terms & condition</span></a>
  <a href="contact_us.php" class="anc"><i class="fas fa-id-card"></i>     <span>Contact Us</span></a>con
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>-->



 <div class="sidebar sidebar-left-nav" style="z-index: 1000;top: 90px;box-shadow:rgb(204 204 204) 3px 3px 15px 0px;">
   <a href="index.php" class="anc"><img src="icon/01.png" width="25" height="25"><span>Home</span></a>
   <a href="manage_profile.php" class="anc"><img src="icon/02.png" width="25" height="25"> <span>User</span></a>
   <a href="#" class="anc"><img src="icon/03.png" width="25" height="25"> <span>Partners</span></a>
   <a href="subscribe_plan.php" class="anc"><img src="icon/04.png" width="25" height="25"> <span>Subscription</span></a>
  <?php
  if($session_id != "")
  {
      ?>
      <a href="manage_subscription.php" class="anc"><img src="icon/04.png" width="25" height="25"> <span>My Subscriptions</span></a>
      <?php
  }
  ?>
  <hr>
  <a href="history_video.php" class="anc"><img src="icon/05.png" width="25" height="25"> <span>History</span></a>
  <a href="liked_videos.php" class="anc"><img src="icon/06.png" width="25" height="25"> <span>Liked videos</span></a>
  <a href="favourites_videos.php" class="anc"><img src="icon/07.png" width="25" height="25"> <span>Favourite videos</span></a>
  <hr>
  <b style="    color: black;margin-left:10px">More From Focal</b>
  <a href="#" class="anc" data-toggle = "tooltip" title = "Get ready for your job and promotion with focalyt "><img src="icon/08.png" width="25" height="25"> <span>Focalyt</span></a>
  <a href="#" class="anc" data-toggle = "tooltip" title = "Schedule Career Consultation with industry experts"><img src="icon/09.png" width="25" height="25"> <span>Focal Counseling</span></a>
  <a href="#" class="anc" data-toggle = "tooltip" title = "Add skill proofs to make your CV standout from others"><img src="icon/10.png" width="25" height="25"> <span>Focal CV</span></a>
  <a href="#" class="anc" data-toggle = "tooltip" title = "Put your skills to the test "><img src="icon/11.png" width="25" height="25"> <span>Focal Test</span></a>
  <a href="#" class="anc" data-toggle = "tooltip" title = "Unlock possibilities by enrolling for Future Courses"><img src="icon/12.png" width="25" height="25"> <span>FLMS</span></a>
  <a href="#" class="anc" ><img src="icon/13.png" width="25" height="25"> <span>Perfectus Recruit</span></a>
  
  <hr>
  <a href="#" class="anc"><img src="icon/14.png" width="25" height="25"> <span>Settings</span></a>
  <a href="#" class="anc"><img src="icon/15.png" width="25" height="25"> <span>Help</span></a>
  <a href="#" class="anc"><img src="icon/16.png" width="25" height="25"> <span>Feedback</span></a>
  <hr>
  <div class="use_link">
  <a href="about_us.php"><span>About</span></a> |
  <a href="#"><span>Streams</span></a> |
  <a href="#"><span>Team</span></a> |
  <a href="#"><span>Features</span></a> |
  <a href="#"><span>How to Monetize</span></a> |
  <a href="privacy_policy.php" ><span>Privacy Policy</span></a> |
 <a href="terms_and_condition.php"><span>Terms & Conditions</span></a> |
  <a href="contact_us.php" ><span>Contact Us</span></a> |
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

<div id="mySidenav" class="sidenav">
   <div>
        <a href="index.php" class="anc"><img src="icon/01.png" width="25" height="25"><span>Home</span></a>
   <a href="manage_profile.php" class="anc"><img src="icon/02.png" width="25" height="25"> <span>User</span></a>
   <a href="#" class="anc"><img src="icon/03.png" width="25" height="25"> <span>Partners</span></a>
   <a href="subscribe_plan.php" class="anc"><img src="icon/04.png" width="25" height="25"> <span>Subscription</span></a>
  <?php
  if($session_id != "")
  {
      ?>
      <a href="manage_subscription.php" class="anc"><img src="icon/04.png" width="25" height="25"> <span>My Subscriptions</span></a>
      <?php
  }
  ?>
  <hr>
  <a href="history_video.php" class="anc"><img src="icon/05.png" width="25" height="25"> <span>History</span></a>
  <a href="liked_videos.php" class="anc"><img src="icon/06.png" width="25" height="25"> <span>Liked videos</span></a>
  <a href="favourites_videos.php" class="anc"><img src="icon/07.png" width="25" height="25"> <span>Favourite videos</span></a>
  <hr>
  <b style="    color: black;margin-left:10px">More From Focal</b>
  <a href="#" class="anc"><img src="icon/08.png" width="25" height="25"> <span>Focalyt</span></a>
  <a href="#" class="anc"><img src="icon/09.png" width="25" height="25"> <span>Focal Counseling</span></a>
  <a href="#" class="anc"><img src="icon/10.png" width="25" height="25"> <span>Focal CV</span></a>
  <a href="#" class="anc"><img src="icon/11.png" width="25" height="25"> <span>Focal Test</span></a>
  <a href="#" class="anc"><img src="icon/12.png" width="25" height="25"> <span>FLMS</span></a>
  <a href="#" class="anc"><img src="icon/13.png" width="25" height="25"> <span>Perfectus Recruit</span></a>
  
  <hr>
  <a href="#" class="anc"><img src="icon/14.png" width="25" height="25"> <span>Settings</span></a>
  <a href="#" class="anc"><img src="icon/15.png" width="25" height="25"> <span>Help</span></a>
  <a href="#" class="anc"><img src="icon/16.png" width="25" height="25"> <span>Feedback</span></a>
  <hr>
  <div class="use_link">
  <a href="about_us.php"><span>About</span></a> |
  <a href="#"><span>Streams</span></a> |
  <a href="#"><span>Team</span></a> |
  <a href="#"><span>Features</span></a> |
  <a href="#"><span>How to Monetize</span></a> |
  <a href="privacy_policy.php" ><span>Privacy Policy</span></a> |
 <a href="terms_and_condition.php"><span>Terms & Conditions</span></a> |
  <a href="contact_us.php" ><span>Contact Us</span></a> 
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  </div>


</div>

<style>
.use_link a span
{
    font-size:14px;
}
.use_link
{
        margin-left: 10px;
    margin-right: 10px;
    display:block;
}
.use_link a
{
    display:inline-block;
    padding:unset;
}
hr
{
        border-bottom: 2px solid #e8e6e6 !important;
    width: -webkit-fill-available !important;
    margin: 0 10px 0 10px;
}
datalist
{
   position: fixed;
}

</style>

<div class="content_side">
   
<header id="gen-header" class="gen-header-style-1 gen-has-sticky" style=" position: fixed;">
      <div class="gen-bottom-header">
         <div class="container" style="    max-width: -webkit-fill-available;">
            <div class="row">
               <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                  <a id="sidebar_open_close"><i class="fas fa-bars" style="font-size: 35px !important;margin-right: 15px;"></i></a>
                  <a id="mobile_sidebar_open_close" onclick="openNav()"><i class="fas fa-bars" style="font-size: 30px !important;margin-right: 10px;"></i></a>
                  <a class="navbar-brand desktop"  href="index.php" style="display:block;    width: 10%;" >
                        <img class="img-fluid logo" src="images/logo-1.png" alt="Focalyt-image">
                     </a>
                     <div class="gen-search-form desktop" style="width:-webkit-fill-available">

                     <style>
   input[list]:focus {
    outline: none;
}
input[list] + div[list] {
    display: none;
    position: absolute;
    width: 100%;
    max-height: 164px;
    overflow-y: auto;
    max-width: 330px;
    background: #FFF;
    border: var(--border);
    border-top: none;
  border-radius: 0 0 5px 5px;
  box-shadow: 0 3px 3px -3px #333;
    z-index: 100;
}
input[list] + div[list] span {
    display: block;
    padding: 7px 5px 7px 20px;
    color: #069;
    text-decoration: none;
    cursor: pointer;
}
input[list] + div[list] span:not(:last-child) {
  border-bottom: 1px solid #EEE;
}
input[list] + div[list] span:hover {
    background: rgba(100, 120, 140, .2);
}
* {
  scrollbar-width: thin;
    scrollbar-color: #BBB #EEE;
}

*::-webkit-scrollbar {
  width: 10px;
}

*::-webkit-scrollbar-track {
  background: #C0C3C6;
}

*::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 10px;
  border: 3px solid #C0C3C6;
}

</style>
<script>$(document).on('dblclick', 'input[list]', function(event){
    event.preventDefault();
        var str = $(this).val();
    $('div[list='+$(this).attr('list')+'] span').each(function(k, obj){
            if($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0){
                $(this).hide();
            }
        })
    $('div[list='+$(this).attr('list')+']').toggle(100);
    $(this).focus();
})

$(document).on('blur', 'input[list]', function(event){
        event.preventDefault();
        var list = $(this).attr('list');
        setTimeout(function(){
            $('div[list='+list+']').hide(100);
        }, 100);
    })

    $(document).on('click', 'div[list] span', function(event){
        event.preventDefault();
        var list = $(this).parent().attr('list');
        var item = $(this).html();
        $('input[list='+list+']').val(item);
        $('div[list='+list+']').hide(100);
    })

$(document).on('keyup', 'input[list]', function(event){
        event.preventDefault();
        var list = $(this).attr('list');
    var divList =  $('div[list='+$(this).attr('list')+']');
    if(event.which == 27){ // esc
        $(divList).hide(200);
        $(this).focus();
    }
    else if(event.which == 13){ // enter
        if($('div[list='+list+'] span:visible').length == 1){
            var str = $('div[list='+list+'] span:visible').html();
            $('input[list='+list+']').val(str);
            $('div[list='+list+']').hide(100);
        }
    }
    else if(event.which == 9){ // tab
        $('div[list]').hide();
    }
    else {
        $('div[list='+list+']').show(100);
        var str  = $(this).val();
        $('div[list='+$(this).attr('list')+'] span').each(function(){
          if($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0){
            $(this).hide(200);
          }
          else {
            $(this).show(200);
          }
        })
      }
    })</script>
                              <form role="search" method="GET" class="search-form " action="search.php" style="margin: auto;width:50%">
                                 <label>

                                    <input type="search" class="search-field" id="search-box" list="suggesstion-box" placeholder="Search …" value="<?=$_GET['s']?>" name="s" autocomplete="off">                                    
                                    <div list="suggesstion-box" id="suggesstion-box" style="margin-top: 10%;max-height: unset;max-width: -webkit-fill-available;" >
                                    </div>
                                 </label>
                                 <button type="submit" class="search-submit"><span
                                       class="screen-reader-text"></span></button>
                              </form>
                           </div>
                     <div class="gen-header-info-box">
                        <div class="gen-menu-search-block mobile">
                           <a href="#" id="gen-seacrh-btn_open" style="height: 30px;width: 30px;line-height: 30px;text-align: center;background: var(--primary-color);color: var(--white-color);display: inline-block;border-radius: 90px;"><i class="fa fa-search"></i></a> 
                        </div>
                        <?php
                        if(isset($_SESSION['user']))
                        {
                           ?>
                           <div class="gen-account-holder">
                              <a href="logout.php" id="gen-user-btn" onclick="return confirm('Are you sure you want to Logout now?')"><i class="fas fa-sign-out-alt"></i></a>
                           </div>
                           <?php

                        }  
                        else
                        {
                           ?>
                           <div class="gen-account-holder">
                           <a href="login.php" id="gen-user-btn"><i class="fa fa-user"></i></a>
                        </div>
                           <?php

                        } 
                        ?>
                        
                     </div>
                     <!--<button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                     </button>-->
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="cat_stick parent">
   <ul class="child scroll" style="cursor: grab;overflow: auto;" >
  
      <li id="all"><a href="#">all</a></li>
      <?php
       $category_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `status` = '1'");  
       while($row = mysqli_fetch_assoc($category_sql))
       {
         $course_sql1 = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_category` = '$row[category_code]' AND `status` = '1'");
         if(mysqli_num_rows($course_sql1) > 0)
         {
             $CATCATCAT = preg_replace('/[^A-Za-z0-9\-]/', '',$row['cat_name']);
      ?>
      <li id="<?=$CATCATCAT?>"><a href="#<?=$CATCATCAT?>1"><?=$row['cat_name']?></a></li>
      <?php
         }
       }
      ?>
      
   </ul>
</div>

<div class="cat_stick cat_stick1 parent" style="display:none">
   <ul class="child scroll" style="cursor: grab;overflow: auto;" >
    <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev">
    <</a>
      <?php
       $category_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `status` = '1'");  
       while($row = mysqli_fetch_assoc($category_sql))
       {
         $course_sql1 = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_category` = '$row[category_code]' AND `status` = '1'");
         if(mysqli_num_rows($course_sql1) > 0)
         {
             $CATCATCAT = preg_replace('/[^A-Za-z0-9\-]/', '',$row['cat_name']);
      ?>
      <li id="<?=$CATCATCAT?>"><a href="videos.php?cc=<?=$row['category_code']?>"><?=$row['cat_name']?></a></li>
      <?php
         }
       }
      ?>
      
   </ul>
</div>
<style>
.cat_stick li:hover a
{
    color:white !important;
    transition: none;
}
.cat_stick a:hover
{
    color:white !important;
    transition: none;
}
.cat_stick li a
{
    color:black;
    transition: none;
}

.cat_stick li:active
{
    background: black !important; /*#cf5353;*/
}
.cat_stick li:selected a
{
    color: white !important; /*#cf5353;*/
}
.cat_stick li:hover 
{
    background: black !important; /*#cf5353;*/
}

</style>

   </header>
   <div id="mobile_search" style="display:none;margin-bottom:-65px;position: fixed;z-index: 999;width: -webkit-fill-available;margin-right: 20px;margin-left: -10px;">

                              

                              <form role="search"  method="GET" class="search-form " action="search.php"  style="margin: auto;z-index:999999999;display: flex;">
                              <button type="submit" class="search-submit1" id="gen-seacrh-btn_close"><span
                                       class="screen-reader-text" ></span></button>   
                              <label> 
                                    <span class="screen-reader-text"></span>
                                    <input id="search-box1" type="search" list="suggesstion-box1" class="search-field" placeholder="Search …" value="" name="s" style="text-align:center;border-radius:20px;background: white;" autocomplete="off">
                                    <div list="suggesstion-box1" id="suggesstion-box1" style="    margin-top: 20%;max-height: unset;max-width: -webkit-fill-available;" >
                                    </div>
                                 </label>
                                 <button type="submit" class="search-submit2"><span
                                       class="screen-reader-text"></span></button>
                              </form>
                              </div>

<div class="extra_space">
   &nbsp;
</div>

<script>
$(document).ready(function(){




	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "suggestions_submit.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
//			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});

   $("#search-box1").keyup(function(){
		$.ajax({
		type: "POST",
		url: "suggestions_submit.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
	//		$("#search-box1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box1").show();
			$("#suggesstion-box1").html(data);
			$("#search-box1").css("background","#FFF");
		}
		});
	});
});

</script>