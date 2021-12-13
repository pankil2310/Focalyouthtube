<?php
include('../config.php');
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
$course_preview_time = $_POST['course_preview_time'];

$course_name1 = str_replace(' ', '_', $course_name);

if($course_isfree == '1')
{
    $course_price = '';
}
else
{
    $course_price = $_POST['course_price'];
}


$course_status = $_POST['course_status'];
$updated_date = DATE('Y/m/d');


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
    $uploadOk =  1;

    if($_FILES["course_image"]["name"])
    {

        $target_file = $target_dir . basename($_FILES["course_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $target_file_upload = $target_dir . $course_code .".".$imageFileType;
        $target_file_db = $target_dir2 . $course_code .".".$imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
    }

    if($_FILES["course_thumb"]["name"])
    {
        $target_file_thumb = $target_dir . basename($_FILES["course_thumb"]["name"]);
        $imageFileType1 = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
        $target_file_thumb_upload = $target_dir . $course_code ."_thumb.".$imageFileType1;
        $target_file_thumb_db = $target_dir2 . $course_code ."_thumb.".$imageFileType1;
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
            echo "Sorry, only JPG, JPEG &  PNG files are allowed.";
            $uploadOk = 0;
            }
    }

    if($_FILES["course_video"]["name"])
    {
        $target_file_video = $target_dir1 . basename($_FILES["course_video"]["name"]);
        $videoFileType = strtolower(pathinfo($target_file_video,PATHINFO_EXTENSION));
        $target_file_video_upload = $target_dir1 . $course_code ."_video.".$videoFileType;
        $target_file_video_db = $target_dir11 . $course_code ."_video.".$videoFileType;
        if($videoFileType != "mp4" && $videoFileType != "mkv" && $videoFileType != "mov") {
            echo "Sorry, only mp4, mkv & mov files are allowed.";
            $uploadOk = 0;
            } 
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

        $update_course_sql = "UPDATE `courses` SET `course_name` = '$course_name', `course_category` = '$course_category', `course_description` = '$course_desc', `course_short_description` = '$course_short_desc',`course_metadata` = '$course_metadata', `course_duration` = '$course_duration',`is_free` = '$course_isfree', `price` = '$course_price', `updated_by` = '$session_id', `updated_date` = '$updated_date'";

        if($_FILES["course_image"]["name"])
        {
            if(move_uploaded_file($_FILES["course_image"]["tmp_name"], $target_file_upload))
            {
                $update_course_sql.=",`course_image` = '$target_file_db'";
            }
            else
            {
                echo "<script>
                alert('Please Try After sometime.');
                window.location.href='add_new_course.php';
                </script>";
            }

        }

        if($_FILES["course_thumb"]["name"])
        {
            if(move_uploaded_file($_FILES["course_thumb"]["tmp_name"], $target_file_thumb_upload))
            {
                $update_course_sql.=",`course_thumbanil` = '$target_file_thumb_db'";
            }
            else
            {
                echo "<script>
                alert('Please Try After sometime.');
                window.location.href='add_new_course.php';
                </script>";
            }

        }

        if($_FILES["course_video"]["name"])
        {
            if(move_uploaded_file($_FILES["course_video"]["tmp_name"], $target_file_video_upload))
            {
                $file_name = $target_file_video_upload;            
                $duration = $course_preview_time;
                $cut_from = "00:00:00";
                $Final_output = dirname($file_name)."/".$course_code ."_video_short.".$videoFileType;
                $Final_output_db = dirname($target_file_video_db)."/".$course_code ."_video_short.".$videoFileType;       
                // echo $final_output_db;
            

                $file_name1 = "http://focalyt.panomatechs.com/".$target_file_video_db;                        
                $final_path = $target_file_video_upload;
                            
                $url = 'https://focalyouthtube.com/admin/add_new_course_submit.php';
                $command = "ffmpeg -i " . $file_name . " -vcodec copy -ss " . $cut_from . " -t " . $duration . " -y ".$Final_output;
                shell_exec($command);

/*                $ch = curl_init($url);
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
                curl_close($ch);   */


                $update_course_sql.=",`course_video` = '$target_file_video_db',`course_short_video` = '$Final_output_db',`course_preview_time` = '$course_preview_time'";
            }
            else
            {
                echo "<script>
                alert('Please Try After sometime.');
                window.location.href='add_new_course.php';
                </script>";
            }

        }

        if($session_id == '1')
        {
            $update_course_sql.=",`status` = '$course_status'";   
        }
        

        $update_course_sql.=" WHERE `course_code` = '$course_code'";   
        include('../config.php');
            $update_course = mysqli_query($connect,$update_course_sql);

            if($update_course)
            {                
                echo "<script>
                alert('Course Updated Succesfully');
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





?>