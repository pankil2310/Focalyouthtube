<?php

include('header.php');
?>



<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600);
html {
  border-top: 5px solid #fff;
  background: #58DDAF;
  color: #2a2a2a;
}

html,
body {
  margin: 0;
  padding: 0;
  font-family: 'Open Sans';
}

h1 {
  color: #fff;
  text-align: center;
  font-weight: 300;
}

#slider1 {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
}

#slider1 ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 200px;
  list-style: none;
}

#slider1 ul li {
  position: relative;
  display: block;
  float: left;
  margin-left: 39px;
  padding: 0;
  width: 10%;
  height: 33%;
  background: #ccc;
  text-align: center;
  line-height: 60px;
  border-radius: 100px;
}

a.control_prev,
a.control_next {
  position: absolute;
  z-index: 999;
  display: block;
  padding: 4% 2%;
  width: auto;
  height: auto;
  background: #2a2a2a;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 18px;
  opacity: 0.8;
  cursor: pointer;
}

a.control_prev:hover,
a.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
  border-radius: 0 2px 2px 0;
}

a.control_next {
  right: 0;
  border-radius: 2px 0 0 2px;
}

.slider1_option {
  position: relative;
  margin: 10px auto;
  width: 160px;
  font-size: 18px;
}
</style>
<script>
jQuery(document).ready(function($) {

  var slideCount = $('#slider1 ul li').length;
  var slideWidth = $('#slider1 ul li').width();
  var slideHeight = $('#slider1 ul li').height();
  var slider1UlWidth = slideCount * slideWidth;

  $('#slider1').css({
    width: slideWidth,
    height: slideHeight
  });

  $('#slider1 ul').css({
    width: slider1UlWidth,
    marginLeft: -slideWidth
  });

  $('#slider1 ul li:last-child').prependTo('#slider1 ul');

  function moveLeft() {
    $('#slider1 ul').animate({
      left: +slideWidth
    }, 200, function() {
      $('#slider1 ul li:last-child').prependTo('#slider1 ul');
      $('#slider1 ul').css('left', '');
    });
  };

  function moveRight() {
    $('#slider1 ul').animate({
      left: -slideWidth
    }, 200, function() {
      $('#slider1 ul li:first-child').appendTo('#slider1 ul');
      $('#slider1 ul').css('left', '');
    });
  };

  $('a.control_prev').click(function() {
    moveLeft();
  });

  $('a.control_next').click(function() {
    moveRight();
  });

});
</script>
<div id="slider1">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev">
    <</a>
      <ul>
        <li>SLIDE 1</li>
        <li style="background: #aaa;">SLIDE 2</li>
        <li>SLIDE 3</li>
        <li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 5</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
		<li style="background: #aaa;">SLIDE 4</li>
      </ul>
</div>



<?php
include('footer.php');
?>