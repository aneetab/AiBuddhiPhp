<?php
require('top.inc.php');
$industry='';
$id='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from sort_by where type='industry' and id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $industry=$row['name'];
    }
    else{
        header('location:industry.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $industry=get_safe_value($con,$_POST['industry']);
    $res=mysqli_query($con,"select * from sort_by where type='industry' and name='$industry'");
    $check=mysqli_num_rows($res);
    if($check>0){
      $msg="Industry already exists!";
    }else{
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update sort_by set name='$industry' where id='$id'");
    }
    else{
    mysqli_query($con,"insert into sort_by(type,name,status) values('industry','$industry','1')");
    }
    header('location:industry.php');
    die();
}
}

$sql="select * from sort_by where type='industry' order by name desc";
$res=mysqli_query($con,$sql);
?>
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
                    <div class="card">
                        <div class="card-header">Industry Form</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-store"></i></div>
                                        <input value="<?php echo $industry ?>" type="text" required id="industry" name="industry" placeholder="Enter industry name" class="form-control">
                                    </div>
                                </div>
                                

                                <div class="form-actions form-group"><button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button></div>
                                <small><?php echo $msg?></small><br/>
                            </form>
                        </div>
                    </div>
</div>
</div>
              



<?php
require('footer.inc.php');
?>                    
</body>
</html>

