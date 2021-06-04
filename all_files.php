<?php
require 'connection.inc.php';
require 'functions.inc.php';
$team_id='';
$channel='';
if(isset($_GET['team_id']) && $_GET['team_id']!='') {
    $team_id=get_safe_value($con,$_GET['team_id']);
    $channel=get_safe_value($con,$_GET['channel']);
    $id=$team_id;
}
$level=$channel;
$client_id=$_SESSION['USER_ID'];
$sqlFolders="select * from files,client_users where team_id='$team_id' and channel='$channel' and parent_folder='$level' and client_users.client_id=files.modified_by";
$rows=get_data($con,$sqlFolders);
require('project_team_header.php');
$id='';
?>


 <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
 <div class="container">
 
    
   
     <div class="all_files">
         <?php 
         $output='';
         if(check_num_rows($con,$sqlFolders)=='0')
         {
            $output.='<h3 class="text-center"> No files yet</h3>';
            echo $output;

         }
         else
         {
            $output='<table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Created By</th>
            </tr>
            </thead><tbody>';
   
   foreach($rows as $row1){

           if($row1['file_type']=='folder') 
           {          
           $output .= '<tr>
             <td><a href="view_folder.php?fid='.$row1['file_id'].'&channel='.$channel.'"><i class="fas fa-folder" style="color:#dbbd7d;"></i>  '.$row1['folder_name'].'</a></td>
             <td>'.$row1['added_on'].'</td>
             <td>'.$row1['firstname'].' '.$row1['lastname'].'</td>
           </tr>';
           
           }
        
        
        if($row1['file_type']=='file')
        {
         
                   
                   $output .= '<tr>
                     <td><a target="_blank" href="display.php?id='.$row1['file_id'].'"><i class="fas fa-file-alt" style="color:#dbbd7d;"></i>  '.$row1['file_name'].'</a></td>
                     <td>'.$row1['added_on'].'</td>
                     <td>'.$row1['firstname'].' '.$row1['lastname'].'</td>
                   </tr>';
                           
         }
        }
        $output.='</tbody></table>';
    echo $output;
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
<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){  
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
	$("nav ul li a").each(function(){
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
        url:"submit.php",
        type:"POST",
        dataType:'script',
        cache:false,
        contentType:false,
        processData:false,
        data:form_data,
        success:function(response){
            readFiles(team_id,channel,folder_name);
        }
    });
    readFiles(team_id,channel,folder_name);
}
function insertFolder()
{
    var disp=$('#newfolder').prop('files[]');
    
}
function readFiles(team_id,channel,parent_folder)
{
    var readfile="readfile";
    var team_id=team_id;
    var channel='general';
    var parent_folder=parent_folder;
    $.ajax({
        url:"submit.php",
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
}
function createFolder(team_id,channel,parent_folder)
    {
     
      var folder_name=$('#folder_name').val();
      alert(folder_name);
      var parent_folder=parent_folder;
      var channel=channel;
      var createfolder='createfolder';
      var team_id=team_id;
      $.ajax({
       url:"submit.php",
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
              readFiles(team_id,channel,parent_folder);
            }
});
}

</script>
</body>
</html>