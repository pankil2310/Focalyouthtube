<?php

$dir = "../uploads/courses/";
    
/*$command = "rm -rf " . $dir;
shell_exec($command);*/
chmod_r($dir);
function chmod_r($Path) {
    $dp = opendir($Path);
     while($File = readdir($dp)) {
       if($File != "." AND $File != "..") {
         if(is_dir($File)){
            chmod($File, 0777);
            chmod_r($Path."/".$File);
         }else{
             chmod($Path."/".$File, 0777);
         }
       }
     }
   closedir($dp);
}

?>