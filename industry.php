<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status_sql="update sort_by set status='$status' where id='$id'";
        mysqli_query($con,$update_status_sql);
    }
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from sort_by where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}
$sql="select * from sort_by where type='industry' order by name";
$res=mysqli_query($con,$sql);
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
  <div class="container ml-3"> 

  <!-- Demo content -->
 
  <h5 class="box-title">Industries</h5>
  <h6 class="box-link"><a href="manage_industry.php">Add industry</a></h6>                      
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="5%">ID</th>
      <th scope="col" width="20%">INDUSTRY</th>
      <th scope="col" width=""></th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php 
      if($row['status']==1)
      echo "<a href='?type=status&operation=deactive&id=".$row['id']."'><button class=".'btn-success'.">Active</button></a>&nbsp;";
      else
      echo "<a href='?type=status&operation=active&id=".$row['id']."'><button class=".'btn-warning'.">Deactive</button></a>&nbsp;";
      echo "<a href='?type=delete&id=".$row['id']."'><button class=".'btn-danger'.">Delete</button></a>&nbsp;";
      echo "<a href='manage_industry.php?id=".$row['id']."'><button class=".'btn-dark'.">Edit</button></a>";
      ?></td>
    </tr>
    <?php $i=$i+1;} ?>
  </tbody>
</table>
    </div>
<?php
require('footer.inc.php');
?>                    
</body>
</html>

