<?php
require ('connection.inc.php');
require ('functions.inc.php');
$msg='';
if(isset($_POST['submit']))
{
if(!empty($_FILES["profile-pic"]["name"])) { 
    $fileName = basename($_FILES["profile-pic"]["name"]); 
    echo $fileName;
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['profile-pic']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
        $profile_pic_no='111';
        $date=date('Y-m-d h:i:s');
        $insert = "INSERT into images (id,`image`,uploaded) VALUES('$profile_pic_no','$imgContent','$date')"; 
         
        if(!mysqli_query($con,$insert)){ 
          $msg = "Profile image upload failed, please try again."; 
          $css_class='alert-danger'; 
        }
    }else{ 
        $msg = 'Image must be in JPG, JPEG or PNG format only.'; 
    } 
}
else{ 
    $msg = 'Please select a profile image to upload.'; 
} 
}


?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
    if(!($msg==''))
    echo $msg;
    ?>
    <form class="form-container" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
                        <label class="label" for="file">Profile Pic:</label>
                        <input type="file" name="profile-pic" id="profile-pic" class="form-control" required>
</div>
<div class="form-group">
        <input type="submit" name="submit" value="SUBMIT APPLICATION">
        </div>
</form>

</body>
</html>