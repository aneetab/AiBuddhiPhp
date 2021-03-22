<?php
require('top.inc.php');
$sql="select * from admin_users";
$res=mysqli_query($con,$sql);
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
 
                        
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="15%">#</th>
      <th scope="col" width="15%">ID</th>
      <th scope="col" width="20%">Username</th>
      <th scope="col" width="30%">Password</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['email_id']?></td>
      <td><?php echo $row['password']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php
require('footer.inc.php');
?>                    
</body>
</html>

