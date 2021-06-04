<?php
require('top.inc.php');
$id='';
if(isset($_GET['team_id']) && $_GET['team_id']!='')
{
 $team_id=get_safe_value($con,$_GET['team_id']);

}
$experts="select * from client_users,sme_apply where sme_apply.status='1' and client_users.email_id=sme_apply.email and client_users.client_id NOT IN(SELECT client_id from team_members where team_id='$team_id')";
$experts_res=mysqli_query($con,$experts);

$sqlSelect="select firstname,lastname,id,team_members.role as role from team_members,client_users where team_id='$team_id' and client_users.client_id=team_members.client_id";
$res1=mysqli_query($con,$sqlSelect);
?>
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">
        <h4 class="m-0"></h4>
        <p class="font-weight-normal text-muted mb-0">Welcome,<small><?php echo ' '.$fname?>!</small> </p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Manage Team</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="" class="nav-link text-dark">
                <i class="fas fa-user-plus mr-3 text-primary fa-fw"></i>
                Manage members
            </a>
    </li>
    <li class="nav-item">
    <?php
    $url="admin_library.php?team_id=".$team_id."&channel=general";
    ?>
      <a href="<?php echo $url?>" class="nav-link text-dark">
                <i class="fas fa-file-upload mr-3 text-primary fa-fw"></i>
                Add Files
            </a>
    </li>
    <li class="nav-item">
    <?php
    $url="calendar.php?team_id=".$team_id;
    ?>
      <a href="<?php echo $url?>" class="nav-link text-dark">
                <i class="fas fa-calendar-alt mr-3 text-primary fa-fw"></i>
                Calendar       
            </a>
    </li>
  </ul>
</div>

<div class="page-content pl-5 " id="content">

<button class="btn btn-primary ml-3" onclick="go_back()" style="background:#800000;color:#fff;margin-top:3px"><i class="fas fa-arrow-left"></i> Back</button>
<div class="alert mt-3" id="msg">
                        
</div>
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
 
  
 <div class="container">
   
     <div class="all_members">
         <?php 
         $output='';
         if(mysqli_num_rows($res1)<1)
         {
            $output.='<h3 class="text-center">No members</h3>';
            echo $output;

         }
         
            else
            {
               ?>
               <table class="table table-hover">
               <thead>
               <tr>
               <th scope="col">Name</th>
               <th scope="col">Role</th>
               <th scope="col"></th>
               </tr>
               </thead><tbody>
               <?php
      
      while($row1 = mysqli_fetch_assoc($res1)){
   
                   
                  ?>     
              <tr>
                <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                <td><?php echo $row1['role']?></td>
                <td><a onclick="delete_member(<?php echo $row1['id']?>,<?php echo $team_id ?>)" class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
              </tr>
              <?php 
              
              }
            }
              ?>
           </tbody></table>

    </div>
    </div> 
    <div class="create_team mt-5 text-center" style="background-color:#fff">
                    Add Members:
                    <div id="added_members" style="background-color:#800000;color:#fff; font-weight:bold"></div>
                    <form  class="form-container" id="member_form" action="" method="POST">
                  
                    <div class="form-group">
                   
                    <select onchange="addmember('<?php echo $id?>')" name="experts[]" id="experts" multiple class="form-control">
                    <?php

                    if(mysqli_num_rows($experts_res)>0)
                    {

                        while($expert_row=mysqli_fetch_assoc($experts_res))
                        {
                            echo "<option value='".$expert_row['firstname'].' '.$expert_row['lastname']."(Client ID: ".$expert_row['client_id'].")"."'>".$expert_row['firstname'].' '.$expert_row['lastname']."(Industry: ".$expert_row['industry']." , Enterprise: ".$expert_row['enterprise'].")</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <input style="background-color:#800000;color:#fff" type="submit" name="submit" value="Add Member" class="btn btn-dark"/>
                    </div>
                </form>


  <!-- Demo content -->
 
</div>
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>

</script>
<script src="js/main.js"></script>
<script>
$(document).ready(function(){
    $('#experts').multiselect({
          nonSelectedText:'Select expert',
          enableFiltering:true,
          enableCaseInsensitiveFiltering:true,
          buttonWidth:'400px',
          maxHeight: 200
      });
      var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
	$("#sidebar ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("active");
    });

});
function go_back()
    {
        var team_id='<?=$team_id?>';
    window.location.href="viewrequest.php?id="+team_id;
    }
function addmember(id)
    {
        $('#hidden_team_id').val(id);
        let members='';
      $('#experts option:selected').each(function(){
          members+=$(this).prop('value');
          members+=',';  
            });
            members=members.substr(0,members.length-1);
            $('#added_members').html(members);

     }
        
    $('#member_form').on('submit',function(event){
       event.preventDefault();
       let myForm=document.getElementById("member_form");
       var team_id='<?=$team_id?>';
       var form_data=new FormData();
       form_data=$(this).serializeArray();
       form_data.push({ name:'team_id',value:team_id });
       console.log(form_data);
       
       
       $.ajax({
           url:"admin_backend.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {     
            
            
            $('#experts option:selected').each(function(){
                $(this).prop('selected',false);
            });
            $('#experts').multiselect('refresh');
            $('#added_members').html('');
            myForm.reset();
            window.location.reload();
           
        }
           
        });
                  
      });
function delete_member(id,team_id)
{
    var q=confirm("Are you sure you want to delete this member?");
    if(q===true)
    {
    var deletemember='deletemember';
    $.ajax({
        url:'admin_backend.php',
        method:'post',
        data:{
            id:id,
            deletemember:deletemember,
            team_id:team_id
        },
        success:function(data)
        {
            window.location.reload();
        }

    });
}
}
</script>
   
</body>
</html> 