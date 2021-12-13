<?php
include('config.php');


if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM `courses` WHERE `status` = '1' AND `course_name` like '%" . $_POST["keyword"] . "%' OR `course_description` like '%" . $_POST["keyword"] . "%' OR `course_short_description` like '%" . $_POST["keyword"] . "%' ORDER BY `course_name` LIMIT 0,6";
$result = mysqli_query($connect,$query);
if(!empty($result)) {
?>
<?php
foreach($result as $country) {
?>
<span><?=$country['course_name']?></span>
<?php } ?>
<?php } } ?>
