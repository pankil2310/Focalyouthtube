<script>
  function playVideo() {
            var thumbImg = document.querySelector('img');
            thumbImg.style.display = 'none';
            var starttime = 7;  // start at 7 seconds
            var endtime = 10;    // stop at 17 seconds

            var video = document.getElementById('yourVideoId');

            video.addEventListener("timeupdate", function() {
               if (this.currentTime >= endtime) {
                    this.pause();
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
        }
        function showThumbnail() {
            var thumbImg = document.querySelector('img');
            thumbImg.style.display = 'inherit';
        }

</script>

<video id="yourVideoId" width="240" height="320" onmouseover="playVideo()" onmouseout="showThumbnail()">
        <source src="uploads/courses/0ad3V924Vf/video/videoplayback.mp4" type="video/mp4">
    </video>
    <img src="uploads/courses/0ad3V924Vf/images/FocalytLogoImage.png" width="240" height="320">

    <video controls>
  <source src="uploads/courses/0ad3V924Vf/video/videoplayback.mp4">
</video>


<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />

<body>
  <video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
  >
    <source src="http://localhost/focalyt/uploads/courses/A8uCxlwDMh/video/testvideo.mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

  <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
</body>