<?php
require('top.inc.php');
$sqlindustry="select * from sort_by where type='industry'";
$industries=get_data($con,$sqlindustry);
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
  <div class="container ml-3"> 

  <!-- Demo content -->
 
  <h5 class="box-title">Articles</h5>
  <h6 class="box-link"><a href="create_post.php">Add new article</a></h6> 
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
                <h5 class="card-title"><a style="text-decoration:underline" href="post_admin.php?id=<?php echo $list['post_id']?>"><?php echo $list['post_title']?></a></h5>
                <h6 class="text-center text-muted"><i class="fas fa-eye"></i> <?php echo $list['views']?></h6><br>
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
                    
 
    </div>
<?php
require('footer.inc.php');
?>  
<script>
 var industry=<?php echo json_encode($industries);?>;
    var select1=document.getElementById('industry_select');
    industry.forEach(function (obj, i) {
    select1.appendChild(new Option(obj.name, obj.name));
    });
    function sorting()
  {
    var industry=document.getElementById("industry_select").value;
    var getadminposts='getadminposts';
    $.ajax({
           url:"submit.php",
           method:"POST",
           data:{
             getadminposts:getadminposts,
             industry:industry,
             
           },
           success:function(data,status){
            $('#article_list').html(data);
           
          }
           
        });
  }
  </script>
</script>                  
</body>
</html>

