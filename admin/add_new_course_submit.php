<?php
//include('../config.php');
date_default_timezone_set('Asia/Kolkata');
ini_set("upload_max_filesize", "10G");
ini_set("post_max_size", "10G");




$session_id = $_POST['session_id'];
$course_code = $_POST['course_code'];
$course_category = $_POST['course_category'];
$course_name = $_POST['course_name'];
$course_short_desc = $_POST['course_short_desc'];
$course_desc =$_POST['course_desc'];
$course_metadata = $_POST['course_metadata'];
$course_duration = $_POST['course_duration'];
$course_isfree = $_POST['course_isfree'];
$course_price = $_POST['course_price'];
$course_preview_time = $_POST['course_preview_time'];
$created_date = DATE('Y/m/d');
$created_time =  date('H:i');

$course_name1 = str_replace(' ', '_', $course_name);


$target_dir = "../uploads/courses/".$course_code."/images/";
$target_dir1 = "../uploads/courses/".$course_code."/video/";
$target_dir2 = "uploads/courses/".$course_code."/images/";
$target_dir11 = "uploads/courses/".$course_code."/video/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    if (!file_exists($target_dir1)) {
        mkdir($target_dir1, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["course_image"]["name"]);
    $target_file_thumb = $target_dir . basename($_FILES["course_thumb"]["name"]);
    $target_file_video = $target_dir1 . basename($_FILES["course_video"]["name"]);

    $uploadOk =  1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageFileType1 = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
    $videoFileType = strtolower(pathinfo($target_file_video,PATHINFO_EXTENSION));

//echo $imageFileType;
    $target_file_upload = $target_dir . $course_code .".".$imageFileType;
    $target_file_thumb_upload = $target_dir . $course_code ."_thumb.".$imageFileType1;
    $target_file_video_upload = $target_dir1 . $course_code ."_video.".$videoFileType;


    $target_file_db = $target_dir2 . $course_code .".".$imageFileType;
    $target_file_thumb_db = $target_dir2 . $course_code ."_thumb.".$imageFileType1;
    $target_file_video_db = $target_dir11 . $course_code ."_video.".$videoFileType;


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
        echo "Sorry, only JPG, JPEG &  PNG files are allowed.";
        $uploadOk = 0;
        }
    if($videoFileType != "mp4" && $videoFileType != "mkv" && $videoFileType != "mov") {
        echo "Sorry, only mp4, mkv & mov files are allowed.";
        $uploadOk = 0;
        }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>
        alert('Please Try After sometime.');
        window.location.href='add_new_course.php';
        </script>";
    } 
    else 
    {
        if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $target_file_upload) && move_uploaded_file($_FILES["course_thumb"]["tmp_name"], $target_file_thumb_upload) && move_uploaded_file($_FILES["course_video"]["tmp_name"], $target_file_video_upload)) 
        {
            $file_name = $target_file_video_upload;            
            $duration = $course_preview_time;
            $cut_from = "00:00:00";
            $Final_output = dirname($file_name)."/".$course_code ."_video_short.".$videoFileType;
            $Final_output_db = dirname($target_file_video_db)."/".$course_code ."_video_short.".$videoFileType;        

            $file_name1 = "http://focalyt.panomatechs.com/".$target_file_video_db;                        
            $final_path = $target_file_video_upload;
                          $url = 'https://focalyouthtube.com/admin/add_new_course_submit.php';
                          
            $command = "ffmpeg -i " . $file_name . " -vcodec copy -ss " . $cut_from . " -t " . $duration . " -y ".$Final_output;
            shell_exec($command);
/*            $ch = curl_init($url);
            $data = array(
                'filetocut' => $file_name1,
                'duration' => $duration,
                'final'   => $Final_output,
                'cutfrom'   => '00:00:00',
                'final_path' => $final_path
            );
            $payload = json_encode(array("user" => $data));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);           */
          //  echo $file_name1;
           // var_dump($result);
    
            if($session_id == '1')
            {
                $add_course_sql = "INSERT INTO `courses`(`course_code`,`course_name`, `course_category`, `course_description`, `course_short_description`,`course_metadata`, `course_duration`,`is_free`, `price`, `created_by`, `created_date`,`created_time`,`course_image`,`course_thumbanil`,`course_video`,`course_short_video`,`course_preview_time`,`status`) VALUES ('$course_code','$course_name','$course_category','$course_desc','$course_short_desc','$course_metadata','$course_duration','$course_isfree','$course_price','$session_id','$created_date','$created_time','$target_file_db','$target_file_thumb_db','$target_file_video_db','$Final_output_db','$course_preview_time','1')";
            }
            else
            {
                $add_course_sql = "INSERT INTO `courses`(`course_code`,`course_name`, `course_category`, `course_description`, `course_short_description`,`course_metadata`, `course_duration`,`is_free`, `price`, `created_by`, `created_date`,`created_time`,`course_image`,`course_thumbanil`,`course_video`,`course_short_video`,`course_preview_time`) VALUES ('$course_code','$course_name','$course_category','$course_desc','$course_short_desc','$course_metadata','$course_duration','$course_isfree','$course_price','$session_id','$created_date','$created_time','$target_file_db','$target_file_thumb_db','$target_file_video_db','$Final_output_db','$course_preview_time')";
            }

         //   echo $add_course_sql."<br>";
            include('../config.php');
            $add_course = mysqli_query($connect,$add_course_sql);
         //   var_dump($add_course);
            if($add_course)
            {                
          
                echo "<script>
                alert('Course added Succesfully');
                window.location.href='courses.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Please Try After sometime.');
                window.location.href='add_new_course.php';
                </script>";
            }
        } 
        else {
            echo "<script>
            alert('Please Try After sometime1.');
           window.location.href='add_new_course.php';
            </script>";
        }
    }








?>