   <!-- footer start -->
   <footer id="gen-footer">
    <div class="gen-footer-style-1">
      <!-- <div class="gen-footer-top">
          <div class="container">
             <div class="row">
                <div class="col-xl-3 col-md-6">
                   <div class="widget">   
                      <div class="row">
                         <div class="col-sm-12">
                            <img src="images/asset-0.png" class="gen-footer-logo" alt="gen-footer-logo">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <ul class="social-link">
                               <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a></li>
                               <li><a href="#" class="facebook"><i class="fab fa-skype"></i></a></li>
                               <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xl-3 col-md-6">
                   <div class="widget">
                      <h4 class="footer-title">Explore</h4>
                      <div class="menu-explore-container">
                         <ul class="menu">
                            <li class="menu-item"><a href="index.php" aria-current="page">Home</a></li>
                            <li class="menu-item"><a href="#">Movies</a></li>
                            <li class="menu-item"><a href="#">Tv Shows</a></li>
                            <li class="menu-item"><a href="#">Videos</a></li>
                            <li class="menu-item"><a href="#">Actors</a></li>
                          </ul>
                      </div>
                   </div>
                </div>
                <div class="col-xl-3 col-md-6">
                   <div class="widget">
                      <h4 class="footer-title">Company</h4>
                      <div class="menu-about-container">
                         <ul class="menu">
                            <li class="menu-item"><a href="#">Company</a></li>
                            <li class="menu-item"><a href="#">Privacy Policy</a></li>
                            <li class="menu-item"><a href="#">Terms Of Use</a></li>
                            <li class="menu-item"><a href="#">Help Center</a></li>
                            <li class="menu-item"><a href="#">contact us</a></li>
                          </ul>
                      </div>
                   </div>
                </div>
                <div class="col-xl-3  col-md-6">
                   <div class="widget" style="display:none">
                      <h4 class="footer-title">Downlaod App</h4>
                      <div class="row">
                         <div class="col-sm-12">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <a href="#">
                               <img src="images/asset-35.png" class="gen-playstore-logo" alt="playstore">
                            </a>
                            <a href="#">
                               <img src="images/asset-36.png" class="gen-appstore-logo" alt="appstore">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div> -->
       <div class="gen-copyright-footer">
          <div class="container">
             <div class="row">
                <div class="col-md-12 align-self-center">
                   <span class="gen-copyright"><a target="_blank" href="#"> Copyright 2021 Focalyt All Rights
                         Reserved.</a></span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer End -->
 </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <p style="margin-bottom: auto;color:black;font-weight:600;    font-size: x-large;">Subscribe</p>
        <button type="button" class="close" data-dismiss="modal" style="color:#cf5353;">&times;</button>
      </div>
      <div class="modal-body">
          <table>
              <div class="plan_sub">
            <tr style="vertical-align: middle;">
                <td >Name</td>
                <td>
                    <select id="subplan" style="background:transparent;color:black;height:30px">
                        <option value="">Choose Plan</option>
                        <?php
                        $subplan = mysqli_query($connect,"SELECT * FROM `subscriptions`");
                        while($row = mysqli_fetch_assoc($subplan))
                        {?>
                            <option value="<?=$row['subscription_code']?>"><?=$row['subscription_name']?></option>
                        <?php
                        }
                        
                        ?>
                    </select>
                </td>
            </tr>
            </div>
            <div class="plan_sub_details">
                
                
            </div>
           
            


          </table>      
          <?php
            if($session_id != "")
            {            
          ?>
          <form name="enroll_course_submit" method="POST" class="form_submit">
              <input type="hidden" name="userid" value="<?=$session_id?>">
              <input type="hidden" name="course_code" value="<?=$main_code?>">              
            <input id="purchase" type="submit" value="Subscribe" style="width: -webkit-fill-available;padding:5px;    text-transform: capitalize;"> 
          </form>
          <?php
            }
            else
            {
                ?>
                <a id="purchase" style="text-align:center;width: -webkit-fill-available;padding:5px;text-transform: capitalize;font-family: var(--title-fonts);font-size: 16px;background: var(--primary-color);color: var(--white-color) !important;display: inline-block;border: none;height: auto;line-height: 2;border-radius: 0px;" href="login.php">Subscribe</a>
                <?php
            }
          ?>
      </div>

    </div>

  </div>
</div>
<!-- Modal Popup end -->

<script>
$(document).ready(function () {

   $('#gen-loading').remove();
   $(".form_submit").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);
      var url = form.attr('name') + ".php";
    //  alert(url);
      $.ajax({
         type: "POST",
         url: url,
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData:false, // serializes the form's elements.
    //       data: form.serialize(), // serializes the form's elements.
         success: function(data)
         {
            if(data == 'true' && form.attr('name') == 'register_user' )
            {
               alert("Register Successfuly");
               window.location.href = "login.php";

            }
            else if(data == 'false' && form.attr('name') == 'register_user' )
            {
               alert("Please try again later");
               window.location.href = "register.php";

            }
            else if(data == 'user' && form.attr('name') == 'login_user')
            {
               window.location.href = "index.php";
            }
            else if(data == 'no user' && form.attr('name') == 'login_user')
            {
               alert("Please register you account");
               window.location.href = "register.php";
            }
            else if(data == 'user' && form.attr('name') == 'login_user1')
            {
               window.location.href = "index.php";
            }
            else if(data == 'no user' && form.attr('name') == 'login_user1')
            {
               alert("Please register you account");
               window.location.href = "register.php";
            }
            else if(data == 'Updated' && form.attr('name') == 'update_user')
            {
               alert("Details Updated Successfuly");
               window.location.href = "manage_profile.php";
            }
            else if(data == 'Commented')
            {
               alert("Comment Submited Successfuly");
               window.location.href = window.location.href;
            }
            else if(data == 'enrolled')
            {
               alert("Course Purchased Successfuly");
               window.location.href = window.location.href;
            }
            else if(data == 'like')
            {               
               window.location.href = window.location.href;
            }
            else
            {
               alert(data);
            }
           //alert(data); // show response from the php script.
         }
      });
   });



   $("#sidebar_open_close").click(function(e) {      
      if($(".content_side").hasClass("sidebar_margin_close"))
      {         
         $(".content_side").removeClass("sidebar_margin_close");
         $(".cat_stick ul").css("margin","5px 5px 5px 210px");
         $(".sidebar").css("text-align","left");
   $(".sidebar span").css("font-size","unset");
   $(".sidebar .anc").css("padding","10px");
     //    $(".sidebar").show();
     $(".sidebar").css("width","200px");
     $(".pt-0.pb-0").css("margin","45px -16px");      
     $(".pt-0.pb-0").css("padding","unset");       
      }
      else
      {         
   //      $(".sidebar").hide();
   $(".sidebar").css("width","75px");
   $(".sidebar").css("text-align","center");
   $(".sidebar span").css("font-size","xx-small");
   $(".sidebar .anc").css("padding","6px");
   $(".pt-0.pb-0").css("margin","50px auto");
   $(".pt-0.pb-0").css("padding","0px 60px");       
   
        $(".cat_stick ul").css("margin","5px 5px 5px 85px");
         $(".content_side").addClass("sidebar_margin_close");
      }
   });

   $("#mobile_sidebar_open_close").click(function(e) {      
      if($("#mySidenav").hasClass("mobile_sidebar_margin_close"))
      {         
         $("#mySidenav").removeClass("mobile_sidebar_margin_close");
         $("#mySidenav").css("width","0px");
       //  $("#mySidenav").hide();
      }
      else
      {  
         $("#mySidenav").addClass("mobile_sidebar_margin_close");       
         $("#mySidenav").css("width","250px");
   //      $("#mySidenav").show();
         
      }
   });

   $("#gen-seacrh-btn_open").click(function(e) {      
         $("#mobile_search").show();
     
   });
   $("#gen-seacrh-btn_close").click(function(e) {      
         $("#mobile_search").hide();
     
   });


   $(".wpulike-heart button").click(function(e){
      var code = $(this).data('code');
      var session = "<?php echo $session_id?>";     
       
      if(session == "")
      {
         window.location.href = "login.php";
      }
      else
      {         
         if ( $(this).hasClass("fill") ) 
         { 
            $(this).removeClass('fill');
         }
         else
         {
            $(this).addClass('fill');
         }
         //alert(code);
         //alert(session);
         $.ajax({
            type: "GET",
            url: "addtofav_submit.php",
            data: "code="+code+"&session="+session,
            success: function(data)
            {         
               if(data === "added")
               {
                //  alert(data);      
               }
               else
               {
                  
               }
               
            }
         });

      }

   });

    $("#subplan").change(function(e){
      
      alert($(this).val());  
        
    });
   
});
</script>
<script>
   $(function(){


   

const anchor = "<?php echo substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)?>";
$('.sidebar a[href^="' + anchor + '"]').addClass('active');
$('.sidenav a[href^="' + anchor + '"]').addClass('active');

});
</script>



 
 <!-- Back-to-Top start -->
 <div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
 </div>
 <!-- Back-to-Top end -->
</div>
 <!-- js-min -->


<!--  Login/Signup POPUP -->
<script>

</script>
<!--  Login/Signup POPUP end -->


<script>

</script>


 <!--video auto play -->
<script>
   $(document).ready(function(){
   $('#player1').bind('contextmenu',function() { return false; });
   
});

   $(document).ready(function () {
var figure = $(".video").hover( hoverVideo, hideVideo );

function hoverVideo(e) {     
   $('video', this).attr("id","playvideo");
   $('video', this).show(); 
   var starttime = 0;  // start at 0 seconds
    var endtime = 30;    // stop at 30 seconds
   
      var video = document.getElementById('playvideo');
      document.getElementById('playvideo').muted = true;

      video.addEventListener("timeupdate", function() {
         if (this.currentTime >= endtime) {
            //this.pause();
            this.currentTime = starttime;
         }
      }, false);


      //suppose that video src has been already set properly
      video.load();
      video.play();    //must call this otherwise can't seek on some browsers, e.g. Firefox 4
      try {
         video.currentTime = starttime;
      } catch (ex) {
         //handle exceptions here
      }
    //$('video', this).get(0).play(); 
}

function hideVideo(e) {
   $('video', this).attr("id","");
    $('video', this).get(0).pause(); 
    $('video', this).hide(); 
    
}

   });
</script>
<!--video auto play end-->
<!--category slider -->
<script>

const slider = document.querySelector(".scroll");
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener("mousedown", e => {
  isDown = true;
  slider.classList.add("active");
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener("mouseleave", () => {
  isDown = false;
  slider.classList.remove("active");
});
slider.addEventListener("mouseup", () => {
  isDown = false;
  slider.classList.remove("active");
});
slider.addEventListener("mousemove", e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = x - startX;
  slider.scrollLeft = scrollLeft - walk;
});

</script>
<!--category slider end-->

 <script src="js/jquery-3.6.0.min.js"></script>
 <script src="js/asyncloader.min.js"></script>
 <!-- JS bootstrap -->
 <script src="js/bootstrap.min.js"></script>
 <!-- owl-carousel -->
 <script src="js/owl.carousel.min.js"></script>
 <!-- counter-js -->
 <script src="js/jquery.waypoints.min.js"></script>
 <script src="js/jquery.counterup.min.js"></script>
 <!-- popper-js -->
 <script src="js/popper.min.js"></script>
 <script src="js/swiper-bundle.min.js"></script>
 <!-- Iscotop -->
 <script src="js/isotope.pkgd.min.js"></script>

 <script src="js/jquery.magnific-popup.min.js"></script>

 <script src="js/slick.min.js"></script>

 <script src="js/streamlab-core.js"></script>

 <script src="js/script.js"></script>


</body>
</html>