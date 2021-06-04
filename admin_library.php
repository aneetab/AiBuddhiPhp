<?php
require('top.inc.php');
$id='';
if(isset($_GET['team_id']) && $_GET['team_id']!='')
{
 $team_id=get_safe_value($con,$_GET['team_id']);
 $channel=get_safe_value($con,$_GET['channel']);
}
$level=$channel;
$sqlFolders="select * from files,client_users where team_id='$team_id' and channel='$channel' and parent_folder='$level' and client_users.client_id=files.modified_by";
$rows=get_data($con,$sqlFolders);
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
      <a href="manage_member.php?team_id=<?php echo $team_id?>" class="nav-link text-dark">
                <i class="fas fa-user-plus mr-3 text-primary fa-fw"></i>
                Manage members
            </a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link text-dark">
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
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width:100%">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mx-auto">
  <li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#foldermodal"><i class="fas fa-plus"></i>&nbsp;&nbsp;New Folder</a>
  </li>
  <li class="nav-item">
        <a class="nav-link"href="#" onclick="triggerfileclick()"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</a>
  </li>
  </ul>
 </div>
 </nav>
<button class="btn btn-primary ml-3" onclick="go_back()" style="background:#800000;color:#fff;margin-top:3px"><i class="fas fa-arrow-left"></i> Back</button>
<div class="alert mt-3" id="msg">
                        
</div>
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
 
  
 <div class="container">
   
     <div class="all_files">
         <?php 
         $output='';
         if(check_num_rows($con,$sqlFolders)=='0')
         {
            $output.='<h3 class="text-center">No files yet</h3>';
            echo $output;

         }
         
            else
            {
               ?>
               <table class="table table-hover">
               <thead>
               <tr>
               <th scope="col">Name</th>
               <th scope="col">Created</th>
               <th scope="col">Created By</th>
               <th scope="col">
               </tr>
               </thead><tbody>
               <?php
      
      foreach($rows as $row1){
   
              if($row1['file_type']=='folder') 
              {     
                  ?>     
              <tr>
                <td><a href="viewfolder_admin.php?fid=<?php echo $row1['file_id']?>'&channel=<?php echo $channel?>"><i class="fas fa-folder" style="color:#dbbd7d;"></i><?php echo $row1['folder_name']?></a></td>
                <td><?php echo $row1['added_on'] ?> </td>
                <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                <td><a onclick="delete_file('<?php echo $row1['file_id']?>',folder)" class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
              </tr>
              <?php 
              
              }
           
           
           if($row1['file_type']=='file')
           {
            ?>
                      
                      <tr>
                        <td><a target="_blank" href="display.php?id=<?php echo $row1['file_id']?>"><i class="fas fa-file-alt" style="color:#dbbd7d;"></i><?php echo $row1['file_name']?></a></td>
                        <td><?php echo $row1['added_on']?></td>
                        <td><?php echo $row1['firstname'].' '.$row1['lastname']?></td>
                        <td><a onclick="delete_file('<?php echo $row1['file_id']?>','file')" class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;                     
                      </tr>
             <?php                 
            }
           }
           ?>
           </tbody></table>
        <?php
            }
            ?>
    </div>
    </div> 

 <form id="file_upload" name="file_upload" method="post" enctype="multipart/form-data">
   <div class="form-group">
   <input style="display:none;" onchange="insertFile('<?php echo $team_id?>','<?php echo $channel?>','<?php echo $level?>')" type="file" name="newfile" id="newfile" class="form-control"><br/>
   </div>                       
 </form>         
</div>
</div>
<div class="modal" id="foldermodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create a folder</h3>
                <button type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form" action="" method="POST">
                    <div class="form-group">
                    <input class="form-control" type="text" name="folder_name" id="folder_name" placeholder="Enter your folder name"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark" onclick="createFolder('<?php echo $team_id?>','<?php echo $channel?>','<?php echo $level?>')" name='create' id='create' data-dismiss="modal">Create</button>
            </div>
</div>
</div>
</div>
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
<script type="text/javascript">
$(document).ready(function(){
      
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
	$("#sidebar ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("active");
    });
});
$("#foldermodal").on("hidden.bs.modal",function(){
  $(this).find('#form').trigger('reset');
});
function triggerfileclick()
{
    document.querySelector('#newfile').click();
} 
function triggerfolderclick()
{
    document.querySelector('#newfolder').click();
} 
function insertFile(team_id,channel,folder_name)
{
    var team_id=team_id;
    var folder_name=folder_name;
    var channel=channel;
    var file_data=$('#newfile').prop('files')[0];
    var form_data=new FormData();
    form_data.append("file",file_data);
    form_data.append("insert_file","insert_file");
    form_data.append("team_id",team_id);
    form_data.append("channel",channel);
    form_data.append("folder_name",folder_name);
    $.ajax({
        url:"admin_backend.php",
        type:"POST",
        dataType:'script',
        cache:false,
        contentType:false,
        processData:false,
        data:form_data,
        success:function(response){
            window.location.reload();
        }
    });
    //readFiles(team_id,channel,folder_name);
    window.location.reload();
}
function insertFolder()
{
    var disp=$('#newfolder').prop('files[]');
    
}
/*function readFiles(team_id,channel,parent_folder)
{
    var readfile="readfile";
    var team_id=team_id;
    var channel='general';
    var parent_folder=parent_folder;
    $.ajax({
        url:"admin_backend.php",
        type:"post",
        data:{readfile:readfile,
             team_id:team_id,
             channel:channel,
             parent_folder:parent_folder
            },
        success:function(data,status){
            $('.all_files').html(data);
        }
    });
}*/
function delete_file(id,filetype)
{
    var q=confirm("Are you sure you want to delete this file?");
    if(q)
    {
        var channel='<?=$channel?>';
        var folder_name='<?=$level?>';
        var team_id='<?=$team_id?>';
        var deletefile='deletefile';
        $.ajax({
        url:"admin_backend.php",
        type:"post",
        data:{deletefile:deletefile,
             filetype:filetype,
             channel:channel,
             file_id:id
            },
        success:function(data){
            
           window.location.reload();
        }
    });
    }
}
function go_back()
{
    var team_id='<?=$team_id?>';
    window.location.href="viewrequest.php?id="+team_id;
}
function createFolder(team_id,channel,parent_folder)
    {
     
      var folder_name=$('#folder_name').val();
      var parent_folder=parent_folder;
      var channel=channel;
      var createfolder='createfolder';
      var team_id=team_id;
      $.ajax({
       url:"admin_backend.php",
       type:'post',
       data:{
           folder_name:folder_name,
           parent_folder:parent_folder,
           createfolder:createfolder,
           team_id:team_id,
           channel:channel
           },
        success:function(data,status)
           {
              window.location.reload();
            }
});
}
</script>
   
</body>
</html> 