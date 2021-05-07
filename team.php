<?php
require 'connection.inc.php';
require 'functions.inc.php';
$id='';
if(isset($_GET['id']) && $_GET['id']!='') {
    $id=get_safe_value($con,$_GET['id']);
    $channel=get_safe_value($con,$_GET['channel']);
    $_SESSION['team_id']=$id;
    $_SESSION['channel']=$channel;
}
$sql="select * from project_team where team_id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$client_id=$_SESSION['USER_ID'];
$sqlget="select * from client_users where client_id='$client_id'";
$resClient=mysqli_query($con,$sqlget);
$rowClient=mysqli_fetch_assoc($resClient);
require('project_team_header.php');

?>

    <div class="container">
        <button class="btn btn-primary" onclick="write_post('<?php echo $id?>','<?php echo $channel?>')" style="position:fixed;bottom:0;background:#800000;color:#fff;"><i class="fas fa-edit"></i> Write Post</button>
    </div>
    
 <div class="modal" id="teammodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add members to Team</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-header">
                <small>Start typing a name to add to your team. You can also add people as guests by typing their email addresses.</small>
            </div>
            <div class="modal-body">
                <form id="team_form" action="" method="POST" class="form-inline p-3">
                <input autocomplete="off" type="text" value="" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Enter Name" style="width:80%;">
                <input type="submit" name="submit" onclick="add_member(<?php echo $team_id?>)" value="Add" class="btn btn-info btn-lg rounded-0" style="width:20%;">
                </form>
                <div class="col-md-5">
                <div class="list-group" id="show-list" style="position:relative;margin-top:-18px;width:346px;">
                
                
                </div>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button float-right" class="btn btn-dark" data-dismiss="modal">Close</button>
            
            </div>
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
function write_post(team_id,channel)
{
    var team_id=team_id;
    var channel=channel;
    var url='create_post.php?team_id='+team_id+'&channel='+channel;
    window.location.href=url;
}
function add_member(id)
{
    var team_id=id;
    var term1=$('#search').val();
    var term2=term1.split(":");
    var term3=term2[1].split(")");
    var searchID=term3[0];
    if(searchID!=''){
            $.ajax({
                url:'create_team.php',
                method:'POST',
                data:{searchID:searchID,
                      team_id:team_id},
                success:function(){
                   alert("Added");
                }
            });
            }
    

}
$(document).ready(function(){
    $("#search").keyup(function(){
        var searchText=$(this).val();
        if(searchText!=''){
            $.ajax({
                url:'create_team.php',
                method:'POST',
                data:{query:searchText},
                success:function(response){
                    $("#show-list").html(response);
                }
            });
            }
            else
            {
                $("#show-list").html(''); 
            }
    });
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
	$("nav ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("active");
    })
        
    });
    $(document).on('click','a',function(){
        $("#search").val($(this).text());
        $("#show-list").html('');
    });


</script>
</body>
</html>