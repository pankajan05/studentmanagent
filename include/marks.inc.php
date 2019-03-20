<?php

include_once'db.inc.php';


if(isset($_POST['add'])){
    $head = mysqli_real_escape_string($con,$_POST['head']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
     $file = mysqli_real_escape_string($con,$_POST['file']);
     
     if(empty($head) || empty($content) || empty($file)){
         header("Location:eventedit.php?addempty");
        exit();
     }else{
         
         $sql = "INSERT INTO event VALUES ('$head','$file','$content')";
         $re = mysqli_query($con,$sql);
         
        // echo $sql;
         
         header("Location:../eventedit.php?insertsuccess");
					exit();
         
        
     }
 }else{
    header("Location:../eventedit.php?");
					exit();
}

?>