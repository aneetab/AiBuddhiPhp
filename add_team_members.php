<?php
require('connection.inc.php');
require('functions.inc.php');
$team_id=14;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!--------*CSS files*--------->
  <!--font-awesome-->
  <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--Custom Css file-->
  <title></title>
  <style>
      .modal h3{
        text-transform: uppercase;
    text-align:center;
    letter-spacing: 1px;
    opacity: 0.9;
    font-size: 1rem;
    font-weight:bold;
    line-height:1.9;
    word-spacing:3px;
    font-family:"Poppins",sans-serif;
      }
      .modal-body{
          height:400px!important;
      }
      .modal small{
    opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
      }
      .modal label{
        opacity: 0.9;
    font-size: 0.9rem;
    line-height:1.1;
    font-family:"Poppins",sans-serif;
    color:#000!important;
    text-transform:uppercase;
      }
      .modal .btn-dark{
          width:80px!important;
      }

    .create_or_join button,.modal-footer button{
        background:#363432!important;
        color:#fff !important;
    }
    .create_or_join button:hover,.modal-footer button:hover{

        background:#d4d2cf!important;
    }
    
   
    .card li a.dropdown-toggle::after{
        
        display:none !important;
    }
    .dropleft::before,.dropright::after{
     content: none!important;
     }
      <?php
      include "css/client.css";
      ?>
      .card:hover{
          background:#d4d2cf;
      }
      .card{
        width:18rem;
    margin:1rem;
    background: #fff;
    border-radius: .5rem;
    box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
    position: relative;
    height:220px;
    text-align:center;
      }
      .team-title{
          height:80px;
          width:80px;
          border-radius:5px;
          background:orange;
          box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
          margin:auto;
          color:#fff;
          font-weight:bold;
         padding-top:25px;
         margin-bottom:20px!important;
          margin-bottom:auto;
          text-align:center;
      }
      
  </style>
  </head>
  <body>
    

<div class="modal" style="display:block;" id="teammodal">
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
                <input autocomplete="off" type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Enter Name" style="width:80%;">
                <input type="submit" name="submit" onclick="add_member(<?php echo $team_id?>)" value="Add" class="btn btn-info btn-lg rounded-0" style="width:20%;">
                </form>
                <div class="col-md-5">
                <div class="list-group" id="show-list" style="position:relative;margin-top:-18px;width:346px;">
                as
                
                </div>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button float-right" class="btn btn-dark" data-dismiss="modal">Close</button>
            
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
        
    });
    $(document).on('click','a',function(){
        $("#search").val($(this).text());
        $("#show-list").html('');
    });

</script>
</body>
</html>
