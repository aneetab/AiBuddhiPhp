<?php
include "connection.inc.php";
include "functions.inc.php";
$sqlindustry="select * from sort_by where type='industry'";
$industries=get_data($con,$sqlindustry);

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--------*CSS files*--------->
  <!--font-awesome-->
  <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
      <?php 
      include "css/style.css";
      ?>
  </style>
  </head>
<body>
  <?php include "outerpageheader.php" ?>
  <main class="mt-5">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 col-md-6">
    <select class="form-control" id='industry_select' onchange="sorting()" style="width:70%;margin-top:3px" text="Select">
    <option selected disabled>Sort By: Industry</option>
    <option value="all">All</option>
    </select>
    </div>

    </div>
     
      <section class="text-center mt-5">
          <div class="row" id="article_list">
          <?php
          $get_post=get_posts($con);
          foreach($get_post as $list){
        ?>
          <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="<?php echo $list['post_display']?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a style="text-decoration:underline" href="post.php?id=<?php echo $list['post_id']?>"><?php echo $list['post_title']?></a></h5><br>
                <h6 class="text-muted"><i class="fas fa-tag"></i> <?php echo $list['industry']?></h6>
                <p class="card-text">
                  <?php echo $list['post_desc'] ?>
                </p>
              </div>
            </div>
          </div>
         <?php
          }
          ?>
             
          

        
       

          

          
      </section>
      
    </div>
  </main>
  <?php include "outerpagefooter.php" ?>
  <script>
    
    var industry=<?php echo json_encode($industries);?>;
    var select1=document.getElementById('industry_select');
    industry.forEach(function (obj, i) {
    select1.appendChild(new Option(obj.name, obj.name));
    });
    function sorting()
  {
    var industry=document.getElementById("industry_select").value;
    var getposts='getposts';
    $.ajax({
           url:"submit.php",
           method:"POST",
           data:{
             getposts:getposts,
             industry:industry,
             
           },
           success:function(data,status){
            $('#article_list').html(data);
           
          }
           
        });
  }
  </script>
  <script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

 