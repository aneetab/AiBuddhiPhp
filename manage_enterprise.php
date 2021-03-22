<?php
require('top.inc.php');
$enterprise='';
$id='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from enterprise where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $enterprise=$row['enterprise'];
    }
    else{
        header('location:enterprise.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $enterprise=get_safe_value($con,$_POST['enterprise']);
    $res=mysqli_query($con,"select * from enterprise where enterprise='$enterprise'");
    $check=mysqli_num_rows($res);
    if($check>0){
      $msg="Enterprise already exists!";
    }else{
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update enterprise set enterprise='$enterprise' where id='$id'");
    }
    else{
    mysqli_query($con,"insert into enterprise(enterprise,status) values('$enterprise','1')");
    }
    header('location:enterprise.php');
    die();
}
}

$sql="select * from enterprise order by enterprise desc";
$res=mysqli_query($con,$sql);
?>
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
                    <div class="card">
                        <div class="card-header">Enterprise Form</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-hand-sparkles"></i></div>
                                        <input value="<?php echo $enterprise ?>" type="text" required id="enterprise" name="enterprise" placeholder="Enter enterprise name" class="form-control">
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

