<?php
include "connection.inc.php";
include "functions.inc.php";
$msg='';
$sqlindustry="select * from sort_by where type='industry'";
$industries=get_data($con,$sqlindustry);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
<?php 
include "css/admin.css";
?>
.required::after{
          content:" *";
          color:red;
          height: 20px;
        }

</style>
<link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="summernote/summernote.min.css">
</head>


  <!-- Toggle button -->
 
  <div class="container"> 
  <div class="alert mt-3 mb-3" id="msg">
</div>
                    <div class="card">
                        <div class="card-header">New article</div>
                        <div class="card-body card-block">
                            <form id="postform" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                       <label for="post_title" class="required">Post title:</label>
                                        <input type="text" class="form-control" required id="post_title" name="post_title" placeholder="Enter title to be displayed">    
                                </div>
                                <div class="form-group">
                                       <label for="post_desc" class="required">Post Description:</label>
                                        <input type="text" class="form-control" required id="post_desc" name="post_desc" placeholder="Enter description to be displayed">    
                                </div>
                                <div class="form-group">
                                       <label for="author" class="required">Post Author:</label>
                                        <input type="text" class="form-control" required id="author" name="author" placeholder="Enter author name to be displayed">    
                                </div>
                                <div class="form-group">
                                       <label for="author_email" class="">Author Email(Optional):</label>
                                        <input type="email" class="form-control" required id="author_email" name="author_email" placeholder="Enter author email id to be displayed">    
                                </div>
                                <div class="form-group">
                                       <label for="post_display" class="required">Post Display Image(Allowed formats:png,jpg or jpeg):</label>
                                        <input type="file" class="form-control" required id="post_display" name="post_display" placeholder="Select image to be displayed">    
                                </div>
                                <div class="form-group">
                                       <label for="industry_select" class="required">Industry Tag:</label>
                                       <select id="industry_select" class="form-control" name="industry">
                                       <option selected disabled>Select an industry:</option> 
                                       </select>       
                                </div>
                                <div class="form-group">
                                       <label for="content" class="required">Post Content:</label>
                                        <textarea class="form-control" required id="summernote" name="content" placeholder="Enter content"> </textarea>   
                                </div>
                                

                                <div class="form-actions" style="display:inline-block;"><button type="button" id="submit" name="submit" class="btn btn-success btn-sm">Post</button></div>
                                <div class="form-actions" style="display:inline-block;"><button onclick="go_back()" class="btn btn-success btn-sm">Back</button></div>
                                <small><?php echo $msg?></small><br/>
                            </form>
                        </div>
                    </div>
</div>
</div>
</div>
              



<?php
require('footer.inc.php');
?>   
 <script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<!--<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="summernote/summernote.min.js"></script> 
<script>
var industry=<?php echo json_encode($industries);?>;
var select1=document.getElementById('industry_select');
industry.forEach(function (obj, i) {
    select1.appendChild(new Option(obj.name, obj.name));
});
$(document).ready(function() {
    var markup='';
  $('#summernote').summernote('code',markup);
    $('#submit').click(function(e) {
        e.preventDefault();
        let myForm=document.getElementById("postform");
        var formData = new FormData(myForm);
        var createpost='createpost';
        formData.append('createpost',createpost);
        for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
        
        $.ajax({
            type:'POST',
            url: 'submit.php',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                var data=data.trim();
               if(data==='Success')
             {
              myForm.reset();
              alert("Post uploaded!");
              window.location.reload();  
            }
           else
           {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Failed to upload, please try again later!');
           }
          }
            
        });
    });
});

function go_back()
{
   window.history.back();
}
</script>                
</body>
</html>

