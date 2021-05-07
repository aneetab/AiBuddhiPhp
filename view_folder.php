<?php
require ('connection.inc.php');
require ('functions.inc.php');


if(isset($_GET['channel']) && isset($_GET['fid']))
{
 
    $channel=get_safe_value($con,$_GET['channel']);
    $fid=get_safe_value($con,$_GET['fid']);
    $level='';
    $sqlget="SELECT * from files where `file_id`='$fid'";
    $res=mysqli_query($con,$sqlget);
    $row=mysqli_fetch_assoc($res);
    $folder_name=$row['folder_name'];
    $team_id=$row['team_id'];
    $id=$team_id;
    $level=$folder_name;
    $client_id=$_SESSION['USER_ID'];
    $sqlFolders="select * from files where team_id='$team_id' and channel='$channel' and parent_folder='$folder_name'";
    $res1=mysqli_query($con,$sqlFolders);
  
}
require('project_team_header.php');
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
 <button class="btn btn-primary mt-3" onclick="go_back()" style="background:#800000;color:#fff;"><i class="fas fa-arrow-left"></i>Back</button>
 <p class=" px-3 mt-3 pb-4 mb-0"><?php echo $folder_name?></p>
 

 <div class="dragdrop mt-5 mx-auto" style="width:700px;align:center;" >
    <div class="file_drag_area">
    
   
     <div class="all_files">
     <?php 
         $output='';
         if(mysqli_num_rows($res1)<1)
         {
            $output.='<h3 class="text-center"> Drag and drop files here</h3>
            <img src="assets/images/upload.png" height="300px" width="300px">';
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
   
   while($row1 = mysqli_fetch_assoc($res1)){

           if($row1['file_type']=='folder') 
           {          
           $output .= '<tr>
             <td><a href="view_folder.php?fid='.$row1['file_id'].'&channel='.$channel.'"><i class="fas fa-folder" style="color:#dbbd7d;"></i>  '.$row1['file_name'].'</a></td>
             <td>'.$row1['added_on'].'</td>
             <td>'.$row1['modified_by'].'</td>
           </tr>';
           
           }
        
        
        if($row1['file_type']=='file')
        {
         
                   
                   $output .= '<tr>
                     <td><a target="_blank" href="display.php?id='.$row1['file_id'].'"><i class="fas fa-file-alt" style="color:#dbbd7d;"></i>  '.$row1['file_name'].'</a></td>
                     <td>'.$row1['added_on'].'</td>
                     <td>'.$row1['modified_by'].'</td>
                   </tr>';
                           
         }
        }
        $output.='</tbody></table>';
    echo $output;
         }
         ?>
    </div>
    </div>
    </div> 
    <form id="file_upload" name="file_upload" method="post" enctype="multipart/form-data">
   <div class="form-group">
   <input style="display:none;" onchange="insertFile('<?php echo $team_id?>','<?php echo $channel?>','<?php echo $folder_name?>')" type="file" name="newfile" id="newfile" class="form-control"><br/>
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
            <button type="submit" class="btn btn-dark" onclick="createFolder('<?php echo $team_id?>','<?php echo $channel?>','<?php echo $folder_name?>')" name='create' id='create' data-dismiss="modal">Create</button>
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
    $('.file_drag_area').on('dragover',function(){
        $(this).addClass('file_drag_over');
        return false;
    });
    $('.file_drag_area').on('dragleave',function(){
        $(this).removeClass('file_drag_over');
        return false;
    });
    $('.file_drag_area').on('drop',function(e){
       e.preventDefault();
       $(this).removeClass('file_drag_over');
       var formData=new FormData();
       var channel='<?=$channel?>';
       var folder_name='<?=$folder_name?>';
       var team_id='<?=$team_id?>';
       var files_list=e.originalEvent.dataTransfer.files;
       for(var i=0;i<files_list.length;i++)
       {
           formData.append('file[]',files_list[i]);
       }
       var dragdrop='dragdrop';
       formData.append('dragdrop',dragdrop);
       formData.append('channel',channel);
       formData.append('folder_name',folder_name);
       formData.append('team_id',team_id);
       $.ajax({
           url:"submit.php",
           method:"POST",
           dataType:'script',
           data:formData,
           contentType:false,
           cache:false,
           processData:false,
           success:function(data){
            readFiles(team_id,channel,folder_name);
           }
       })
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
   
}
function insertFolder()
{
    var disp=$('#newfolder').prop('files[]');
    
}
function go_back()
{
    window.history.back();
}

function readFiles(team_id,channel,parent_folder)
{
    var readfile="readfile";
    var team_id=team_id;
    var channel=channel;
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