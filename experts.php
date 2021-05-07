<?php
require('top.inc.php');
    if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
      $id=get_safe_value($con,$_GET['id']);
      mysqli_query($con,"delete from sme_apply where id='$id'");
    }
    
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
 
  <h5 class="box-title">Experts Application</h5>
                      
  <div class="container my-5">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col" width="5%">#</th>
                            <th scope="col" width="23%">Name</th>
                            <th scope="col" width="10%" >Gender </th>
                            <th>Experience </th>
                            <th>Industry </th>
                            <th>Enterprise </th>
                            <th scope="col" width="10%">Status</th>
                    </thead>
                    <tbody>
                    <?php
                          $i=1;
                          $sql1="select * from sme_apply,client_users where sme_apply.status='0' and sme_apply.email=client_users.email_id order by date_time desc";
                          $res1=mysqli_query($con,$sql1);
                          while($row1=mysqli_fetch_assoc($res1)){
                          ?>
                          <tr>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                          <td><?php echo $row1['gender']?></td>
                          <td><?php
                          $output='';
                          $readid=$row1['client_id'];
                          $sqlget="select * from resume where client_id='$readid'";
                          $res2=mysqli_query($con,$sqlget);
                          if(mysqli_num_rows($res2)==0)
                          {
                            echo "NA";
                          }
                          else{
                        
                          while($row2=mysqli_fetch_assoc($res2))
                          {
                           $output.=$row2['start'].'-'.$row2['end']."<br> ".$row2['title'].":<br>".$row2['org']."<hr>";
                           }
                           echo $output;
                          }
                           ?></td>
                          <td><?php echo $row1['industry']?></td>
                          <td><?php echo $row1['enterprise']?></td>
                          <td>
                          <?php 
                          if($row1['status']==0){
                            echo "Applied";
                          }
                          if($row1['status']==1){
                            echo "Approved";
                          }
                          if($row1['status']==2){
                            echo "Rejected";
                          }
                          ?></td>
                    
                          <td>
                          <?php
                          $eye='fa-eye text-primary fa-fw'; 
                          echo "<a href='viewapplication.php?id=".$row1['id']."'><i class='fas " .$eye ."'></i></a>"; ?>
                          <?php
                           $icon='fa-trash text-primary fa-fw mr-3';
                           echo "<a onclick='javascript:confirmationDelete($(this));return false;' href='experts.php?id=".$row1['id']."&type=delete'><i class='fas " .$icon ."'></i></a>&nbsp;";
                           ?>
                        </td>
                        </tr>
                        <?php $i=$i+1;} ?>
                    </tbody>
                    </table>
                    </div>
                    </div>

<h5 class="box-title">Experts Approved</h5>
                      
                      <div class="container my-5">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col" width="5%">#</th>
                            <th scope="col" width="23%">Name</th>
                            <th scope="col" width="10%" >Gender </th>
                            <th>Experience </th>
                            <th>Industry </th>
                            <th>Enterprise </th>
                            <th scope="col" width="10%">Status</th>
                    </thead>
                    <tbody>
                    <?php
                          $i=1;
                          $sql1="select * from sme_apply,client_users where sme_apply.status='1' and sme_apply.email=client_users.email_id order by date_time desc";
                          $res1=mysqli_query($con,$sql1);
                          while($row1=mysqli_fetch_assoc($res1)){
                          ?>
                          <tr>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                          <td><?php echo $row1['gender']?></td>
                          <td><?php
                          $output='';
                          $readid=$row1['client_id'];
                          $sqlget="select * from resume where client_id='$readid'";
                          $res2=mysqli_query($con,$sqlget);
                          if(mysqli_num_rows($res2)==0)
                          {
                            echo "NA";
                          }
                          else{
                        
                          while($row2=mysqli_fetch_assoc($res2))
                          {
                           $output.=$row2['start'].'-'.$row2['end']."<br> ".$row2['title'].":<br>".$row2['org']."<hr>";
                           }
                           echo $output;
                          }
                           ?></td>
                          <td><?php echo $row1['industry']?></td>
                          <td><?php echo $row1['enterprise']?></td>
                          <td>
                          <?php 
                          echo "Approved";
                          ?></td>
                    
                          <td>
                          <?php
                          $eye='fa-eye text-primary fa-fw'; 
                          echo "<a href='viewapplication.php?id=".$row1['id']."'><i class='fas " .$eye ."'></i></a>"; ?>
                          <?php
                           $icon='fa-trash text-primary fa-fw mr-3';
                           echo "<a onclick='javascript:confirmationDelete($(this));return false;' href='experts.php?id=".$row1['id']."&type=delete'><i class='fas " .$icon ."'></i></a>&nbsp;";
                           ?>
                        </td>
                        </tr>
                        <?php $i=$i+1;} ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
   
<?php
require('footer.inc.php');
?>      
<script>
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>              
</body>
</html>

}
