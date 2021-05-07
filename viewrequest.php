<?php
require('top.inc.php');
$id='';
if(isset($_GET['id']) && $_GET['id']!='')
{
 $id=get_safe_value($con,$_GET['id']);
}
$sql1="select * from project_team where team_id='$id'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($res1);
$status1=$row1['status'];
$experts="select * from client_users,sme_apply where sme_apply.status='1' and client_users.email_id=sme_apply.email and client_users.client_id NOT IN(SELECT client_id from team_members where team_id='$id')";
$experts_res=mysqli_query($con,$experts);


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
      <a href="index.php" class="nav-link text-dark">
                <i class="fas fa-user-plus mr-3 text-primary fa-fw"></i>
                Add members
            </a>
    </li>
    <li class="nav-item">
      <a href="clients.php" class="nav-link text-dark">
                <i class="fas fa-user-minus mr-3 text-primary fa-fw"></i>
                Delete members
            </a>
    </li>
  </ul>
</div>

<div class="page-content p-5" id="content">
<button class="btn btn-primary mt-3 ml-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i> Back</button>
<div class="alert mt-3" id="msg">
                        
</div>
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
 
  <h5 class="box-title px-3">Team Name: <?php echo $row1['team_name']?> </h5>
                      
  <div class="container my-5">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        
                        <tbody>
                        
                        <?php 
                        if(mysqli_num_rows($res1)>0)
                        {
                        ?>
                        <tr>
                        <th>Team Description</th>
                        <td><?php echo $row1['team_desc']?></td>
                        </tr>
                        <tr>
                        <th>Industries</th>
                        <td><?php echo $row1['industry']?></td>
                        </tr>
                        <tr>
                        <th>Enterprises</th>
                        <td><?php echo $row1['enterprise']?></td>
                        </tr>
                        <tr>
                        <th>Experts Requested</th>
                        <td><?php echo $row1['experts_requested']?></td>
                        </tr>

                        <?php  } ?>
                    </tbody>
                    </table>
                    </div>
                    <?php 
                    if($status1=='0')
                    {                    
                    ?>
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
                    <input type="hidden" name="" id="hidden_team_id">
                        <input style="background-color:#800000;color:#fff" type="submit" name="submit" value="Create" class="btn btn-dark"/>
                    </div>
                </form>



                    </div>
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class="container text-center">
                    <input style="background-color:#800000;color:#fff" onclick="delete_team('<?php echo $id?>')" value="Delete Team" class="btn btn-dark"/>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
<script>
    
    $(document).ready(function(){
     
      $('#experts').multiselect({
          nonSelectedText:'Select expert',
          enableFiltering:true,
          enableCaseInsensitiveFiltering:true,
          buttonWidth:'400px',
          maxHeight: 200
      });
    
    });
    function delete_team(id)
    {
        var q=confirm("Are you sure you want to delete this team and all its members?");
        if (q == true) 
         {
            var deleteteam="delete";
            var id=id;
            var form_data=new FormData();
            form_data.append('delete',deleteteam);
            form_data.append('team_id',id);
            $.ajax({
            url:"admin_backend.php",
            method:"POST",
            data:form_data,
           success:function(data)
           {
            if(data==='Success')
            {
            $('#msg').addClass('alert-success');
            $('#msg').html('Team deleted successfully!')
            }
           if(data==='No')
           {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Failed to delete team');
           }
          }
           });
         } 
    }
    function go_back()
    {
        window.history.back();
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
       var team_id=$('#hidden_team_id').val();
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
               
            if(data==='Success')
            {
            $('#experts option:selected').each(function(){
                $(this).prop('selected',false);
            });
            $('#experts').multiselect('refresh');
            $('#added_members').html('');
            myForm.reset();
            $('#msg').addClass('alert-success');
            $('#msg').html('Team created successfully!')
          }
          if(data==='No')
          {
            $('#msg').addClass('alert-danger');
            $('#msg').html('Error!Could not create team.');
          }
           
           }
           
        });
                  
      });
</script>
<script src="js/main.js"></script>
   
</body>
</html> 