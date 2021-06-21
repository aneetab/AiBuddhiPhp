<?php
require('top.inc.php');
$sql="select * from sme_apply,client_users where account_status='1' and sme_apply.email=client_users.email_id order by added_on desc";
$res=mysqli_query($con,$sql);
$sql1="select * from client_users where account_status='1' and role='1' order by added_on desc";
$res1=mysqli_query($con,$sql1);

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
      <th scope="col" width="10%">Role</th>
      <th scope="col" width="20%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
     $i=1;
     while($row1=mysqli_fetch_assoc($res1)){
      ?>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row1['client_id']?></td>
      <td><?php echo $row1['email_id']?></td>
      <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
      <td><?php if($row1['role']=='1') echo "Client";
                else echo "SME";
      
      ?></td>
      <td>
        <a onclick="delete_file('<?php echo $row1['client_id']?>','<?php echo $row1['email_id']?>')"><i class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
       </td>
    </tr>
   <?php
    $i++;
     }
  
   ?>
      <?php
      
    while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['client_id']?></td>
      <td><?php echo $row['email_id']?></td>
      <td><?php echo $row['firstname'].' '.$row['lastname']?></td>
      <td><?php if($row['role']=='1') echo "Client";
                else echo "SME";
      
      ?></td>
      <td>
      <?php               if($row['role']=='2'){

                          $eye='fa-eye text-primary fa-fw'; 
                          echo "<a href='viewapplication.php?id=".$row['id']."'><i class='fas " .$eye ."'></i></a>"; 
      }?>
                          &nbsp;&nbsp;
                          <a onclick="delete_file('<?php echo $row['client_id']?>','<?php echo $row['email_id']?>')"><i class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
                           </td>
    </tr>
   
    <?php  $i++;} ?>
    
  </tbody>
</table>
    </div>
<?php
require('footer.inc.php');
?>      
<script>
function delete_file(id,email)
{
var q=confirm("Are you sure you want to delete this client?");
    if(q)
    {
        var deleteclient='deleteclient';
        $.ajax({
        url:"admin_backend.php",
        type:"POST",
        data:{deleteclient:deleteclient,
             id:id,
             email:email,
            },
        success:function(data){
             window.location.reload();
        }
    });
    }
}
</script>              
</body>
</html>

