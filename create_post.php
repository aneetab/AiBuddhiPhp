<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php include "css/admin.css" ?>
        .manage_team{
            position:absolute;
            top: 40px !important;
            right: 100px !important;
        }
        .vertical-nav{
            overflow-x:auto;
        }
        .form-container{
    background:#fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow:0px 0px 10px 0px #000;
    width: 100%;
    margin:12px 0px!important;
}
.post_body{
    
}
        
       
    </style>
</head>
<body>

<div class="container">
<button class="btn btn-primary mt-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i>Back</button>
</div>
<section class="post">
    <div class="post_body container mt-3">
    <form class="form-container" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label class="label" for="title">Enter Post Title</label>
              <input type="text" class="form-control" name="title" id="title" required placeholder="Post title..">
          </div>
          <div class="form-group text-center">
            <img onclick='triggerClick()' id='Display' src='assets/images/placeholder.png'><br>
            <label for="featuredImage" style="margin-top:1px;">Optional Featured Image(Tap to change)</label>
             <input style="display:none;" onchange="displayImage(this)" type="file" name="featuredImage" id="featuredImage" class="form-control"><br/>
          </div>

          <div class="form-group">
              <textarea class="form-control" id="content" name="content" required placeholder="Start writing here.." cols="30" rows="20"></textarea>
          </div>
          <div class="form-group container submission text-center">
          <input style="padding:8px;color:#fff;background:#800000;border-radius:3px;" type="submit" name="submit" value="POST">
          </div>
    </form>
    </div>
    </section>

  <script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
<script type="text/javascript">
function go_back()
{
    window.history.back();
}
function triggerClick(){
            document.querySelector('#featuredImage').click();
        }
        function displayImage(e){
            if(e.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    document.querySelector('#Display').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
</script>
</body>
</html>
