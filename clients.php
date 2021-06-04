<?php
require('top.inc.php');
$sql="select * from client_users order by added_on desc";
$res=mysqli_query($con,$sql);
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
 
  <div class="container ml-3">                     
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="15%">#</th>
      <th scope="col" width="15%">ID</th>
      <th scope="col" width="20%">client_email</th>
      <th scope="col" width="20%">client_name</th>
      <th scope="col" width="30%">Role</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i=1;
    while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['client_id']?></td>
      <td><?php echo $row['email_id']?></td>
      <td><?php echo $row['firstname'].' '.$row['lastname']?></td>
      <td><?php if($row['role']=='1') echo "Client";
                else echo "SME";
      
      ?></td>
    </tr>
   
    <?php  $i++;} ?>
  </tbody>
</table>
    </div>
<?php
require('footer.inc.php');
?>                    
</body>
</html>

