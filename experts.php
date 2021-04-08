<?php
require('top.inc.php');
$msg1='';
$msg2='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $date_val=date("Y-m-d H:i:s");
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $language=$_POST['language'];
    $industry=$_POST['industry'];
    $enterprise=$_POST['enterprise'];
    $about_me=$_POST['about_me'];
    /*PROFILE PIC STARTS*/
    $profile_pic=$_FILES['profile-pic'];
    $filename1=$profile_pic['name'];
    $fileerror1=$profile_pic['error'];
    $filetmp1=$profile_pic['tmp_name'];
    $fileext=explode('.',$filename1);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg');
    if(in_array($filecheck,$fileextstored)){
        $destinationfile1='profilepics/'.$filename1;
        move_uploaded_file($filetmp1,$destinationfile1);
    }else{
        $msg1="Extension must be png/jpg/jpeg";
    }
    /*PROFILE PIC ENDS*/
    /*VIDEO STARTS*/
    $video=$_FILES['video'];
    $filename2=$video['name'];
    $fileerror2=$video['error'];
    $filetmp2=$video['tmp_name'];
    $destinationfile2='intros/'.$filename2;
    move_uploaded_file($filetmp2,$destinationfile2);
    /*VIDEO ENDS*/
    /*RESUME STARTS*/
    $resume=$_FILES['resume'];
    $filename3=$resume['name'];
    $fileerror3=$resume['error'];
    $filetmp3=$resume['tmp_name'];
    $destinationfile3='resume/'.$filename3;
    move_uploaded_file($filetmp3,$destinationfile3);
    /*RESUME ENDS*/
    /*PHOTO ID STARTS*/
    $photo_id=$_FILES['photo-id'];
    $filename4=$photo_id['name'];
    $fileerror4=$photo_id['error'];
    $filetmp4=$photo_id['tmp_name'];
    $fileext=explode('.',$filename4);
    $filecheck=strtolower(end($fileext));
    if(in_array($filecheck,$fileextstored)){
        $destinationfile4='photoID/'.$filename4;
        move_uploaded_file($filetmp4,$destinationfile4);
    }else{
        $msg4="Extension must be png/jpg/jpeg.";
    }
    /*PROFILE PIC ENDS*/
    if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
      $id=get_safe_value($con,$_GET['id']);
      mysqli_query($con,"delete from sme_apply where id='$id'");
    }
    $q="INSERT INTO `sme_apply`(`firstname`,`lastname`,`gender`,`profile-pic`,`language`,`industry`,`enterprise`,`video`,`about_me`,`resume`,`photo-id`,`status`,`date_time`) VALUES ('$firstname','$lastname','$gender','$destinationfile1','$language','$industry','$enterprise','$destinationfile2','$about_me','$destinationfile3','$destinationfile4','0','$date_val')";
    $query=mysqli_query($con,$q);
       
   }
    $sql="select * from sme_apply where status='0' order by date_time desc";
    $res=mysqli_query($con,$sql);
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
        <th>Resume </th>
        <th>Industry </th>
        <th>Enterprise </th>
        <th scope="col" width="10%">Status</th>
</thead>
<tbody>
<?php
      $i=1;
      while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $row['firstname'].' '.$row['lastname']?></td>
      <td><?php echo $row['gender']?></td>
      <td><a href="<?php echo $row['resume']?>" target="_#"><?php echo $row['resume']?></a></td>
      <td><?php echo $row['industry']?></td>
      <td><?php echo $row['enterprise']?></td>
      <td>
      <?php 
      if($row['status']==0){
        echo "Applied";
      }
      if($row['status']==1){
        echo "Approved";
      }
      if($row['status']==2){
        echo "Rejected";
      }
      ?></td>

      <td>
      
      <?php
      $eye='fa-eye text-primary fa-fw'; 
      echo "<a href='viewapplication.php?id=".$row['id']."'><i class='fas " .$eye ."'></i></a>"; ?>
      <?php
       $icon='fa-trash text-primary fa-fw mr-3';
       echo "<a onclick='javascript:confirmationDelete($(this));return false;' href='experts.php?id=".$row['id']."&type=delete'><i class='fas " .$icon ."'></i></a>&nbsp;";
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
                            <th>Resume </th>
                            <th>Industry </th>
                            <th>Enterprise </th>
                            <th scope="col" width="10%">Status</th>
                    </thead>
                    <tbody>
                    <?php
                          $i=1;
                          $sql1="select * from sme_apply where status='1' order by date_time desc";
                          $res1=mysqli_query($con,$sql1);
                          while($row1=mysqli_fetch_assoc($res1)){?>
                          <tr>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                          <td><?php echo $row1['gender']?></td>
                          <td><a href="<?php echo $row1['resume']?>" target="_#"><?php echo $row1['resume']?></a></td>
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
