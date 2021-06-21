<?php
include "connection.inc.php";
include "functions.inc.php";
$client_id=$_SESSION['USER_ID'];
$sql="select * from client_users where client_id='$client_id'";
$row=get_data($con,$sql);
include ('calculator.php');
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
  <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css " rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Custom Css file-->
  <title></title>
  <style>
   <?php
      include "css/client.css";
      ?>
  </style>
  </head>
  <body>
    <!--BOOTSTRAP Responsive Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="clientpage.php">Experts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="project_team_create.php">Projects<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">Calendar<span class="sr-only">(current)</span></a>
      </li>
 </ul>
    
      <ul class="navbar-nav mr-auto hide-nav">
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icons fas fa-envelope mt-3"></i><span class="badge badge-danger" id="msg-count">0</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-check-circle"></i><h5>You're all caught up!</h5><br/>
          <small>No new messages</small></a>
      </li>
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icons fas fa-bell mt-3"></i><span class="badge badge-danger" id="notif-count">0</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-check-circle"></i><h5>You're all caught up!</h5><br/>
          <small>No new notifications</small></a>
                      
      </li>
      </ul>
      <ul class="navbar-nav ml-auto d-sm-none d-none d-md-none d-lg-block">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php 
       $photo=$row[0]['profile_photo'];
         
       ?>
       <img src="<?php echo $photo?>"> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row[0]['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
        ?>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="account_settings.php"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
          <a class="dropdown-item" href="logout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
        </div>
      </li>
      <small>Hi, <?php echo $row[0]['firstname'] ?>!</small>

      
    </ul>
    <ul class="navbar-nav ml-auto d-sm-block d-block d-md-block d-lg-none">
    <li class="nav-item active">
        <a class="nav-link" href="clientpage.php"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="project_team_create.php"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
    <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row[0]['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
    ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="account_settings.php"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
  </div>
</nav>
<?php
    foreach($event_results as $val)
    {   
    ?>
    <div class="container mt-3 mb-3">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="alert alert-info" style="font-weight:bold;">
          <div onclick="closeAlert(this ,'<?php echo $val['eventid']?>')">
          <i class="fas fa-window-close float-right"></i>
          </div>
            <strong><?php echo $val['start'].'-'.$val['end'].'<br>'.$val['name']?><strong>
            
        </div>
        </div>
        </div>
        </div>
   <?php
    }
    ?>
<div class="container">
<div style="background-color:#fff" class="mt-2 mb-2" id="calendar"></div>
</div>
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<form id="addform" class="form-horizontal" method="POST" action="">		
		<div class="modal-header text-center">
		<h4 class="modal-title" id="myModalLabel">Add Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body">
		  <div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			<input type="text" autocomplete="off" name="title" class="form-control" id="title" placeholder="Event Title">
			</div>
		  </div>
		  <div class="form-group">
			<label for="start" class="col-sm-2 control-label">Start Date</label>
			<div class="col-sm-10">
			<input autocomplete="off" type="text" name="picker1" class="form-control" id="picker1">
			</div>
		  </div>
		  <div class="form-group">
			<label for="end" class="col-sm-2 control-label">End Date</label>
			<div class="col-sm-10">
		    <input type="text" autocomplete="off" name="picker2" class="form-control" id="picker2">
			</div>
		  </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="submitButton">Save</button>
	    </div>
		</form>
	</div>
	</div>
 </div>
		
				<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<form id="editform" class="form-horizontal" method="POST" action="">
		<div class="modal-header">
		<h4 class="modal-title" id="myModalLabel">Modify Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body">
        	<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			<input type="text" name="edittitle" class="form-control" id="edittitle" placeholder="Event Title">
			</div>
			</div>
            <div class="form-group">
		   <label for="modalWhen" class="col-sm-2 control-label">Date</label>
           <div class="col-sm-10">
           <p id="modalWhen"></p>
           </div>
		    </div>
            <div class="form-group" id="desc" >
		   <label for="modalDesc" class="col-sm-2 control-label">Description:</label>
           <div class="col-sm-10">
           <p id="modalDesc"></p>
		    </div>
		    </div>
				  
			<input type="hidden" name="eventid" class="form-control" id="eventid">
	      </div>
		  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal" id='deleteButton'>Delete</button>
				<button type="submit" class="btn btn-primary" id="editButton">Save</button>
		  </div>
		  </form>
		  </div>
		  </div>
		</div>


     



    <!--FOOTER SECTION-->

<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
let url='load.php/client_id='+<?php echo $client_id?>;
 console.log(url);
 $(document).ready(function() {
    $("#ModalAdd").on("hidden.bs.modal",function(){
  $(this).find('#addform').trigger('reset');
	});
  $("#ModalEdit").on("hidden.bs.modal",function(){
  $(this).find('#editform').trigger('reset');
  });
 

		$('#calendar').fullCalendar({
			header: {
		  	left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay',
			},
			editable: false,
			eventLimit: true, 
			selectable: false,
			selectHelper: false,
            resizable:true,
            eventResize: true,
            eventDurationEditable:true,
            allDayDefault: false,
			select: function(start, end) {
				
				$('#ModalAdd #picker1').val(moment(start).format('YYYY-MM-DD HH:mm'));
				$('#ModalAdd').modal('show');
                
			},
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #eventid').val(event.id);
					$('#ModalEdit #edittitle').val(event.title);
                    endtime = $.fullCalendar.moment(event.end).format('dddd, MMMM Do YYYY, h:mm a');
                    starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm a');
                    var mywhen = starttime + ' - ' + endtime;
                    $('#modalWhen').text(mywhen);
                    if(event.description)
                    {
                        $('#modalDesc').text(event.description);
                    }else
                    {
                        $('#modalDesc').text("Not available");
                    }


					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { 

				edit(event);

			},

			events: 'load.php?client_id='+<?php echo $client_id;?>
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			id =  event.id;	
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Event was successfully saved');
					}else{
						alert('Error updating event date'); 
					}
				}
			});
		}
      
  $('#deleteButton').on('click', function(e){
       e.preventDefault();
       doDelete();
   });
   $('#editButton').on('click', function(e){
       e.preventDefault();
       doUpdate();
   });
   
   function doDelete(){
       $("#ModalEdit").modal('hide');
       var q=confirm("Are you sure you want to delete this event?");
       console.log(q);
       if(q==true)
       {
       var eventID = $('#eventid').val();
       $.ajax({
           url: 'addEvent.php',
           data: 'action=delete&id='+eventID,
           type: "POST",
           success: function(json) {
               window.location.reload(); 
           }
       });
    }
   }
   function doUpdate(){
       $("#ModalEdit").modal('hide');
       var eventID = $('#eventid').val();
	   var title = $('#edittitle').val();
       $.ajax({
           url: 'addEvent.php',
           data: 'action=update&id='+eventID+'&title='+title,
           type: "POST",
		   success: function(rep) {
			       
					window.location.reload();	
				}
       });
    }
   
   $('#submitButton').on('click', function(e){
       e.preventDefault();
       doSubmit('<?php echo $client_id?>');
   });
        function doSubmit(client_id){
       $("#ModalAdd").modal('hide');
       var title = $('#title').val();
       var startTime = $('#picker1').val();
       var endTime = $('#picker2').val();
       var client_id=client_id;
       $.ajax({
           url: 'addEvent.php',
           data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime+"&client_id="+client_id,
           type: "POST",
           success: function(data) {
			window.location.reload();
            var newEvent = {
                title : title,
                start : startTime,
                end:endTime,
                allDay: false,
                color:'#83c0de',
                client_id:client_id
        
            };
            $('#calendar').fullCalendar('refetchEvent');
			
        }
       });
    }
});
       
  </script>
  <script>
  $('#picker1').datetimepicker({
      timepicker:true,
      datepicker:true,
      format:'Y-m-d H:i',
      step:30,
      onShow:function(ct){
          this.setOptions({
              maxDate:$('#picker2').val()?$('#picker2').val():false
          })
      }
  })
  $('#picker2').datetimepicker({
      timepicker:true,
      datepicker:true,
      format:'Y-m-d H:i',
      step:30,
      onShow:function(ct){
          this.setOptions({
              minDate:$('#picker1').val()?$('#picker1').val():false
          })
      }
  })
  function closeAlert(e,id)
    {
      var updateevent='updateevent';
      $.ajax({
        url:'updateEvent.php',
        type:"post",
        data:{updateevent:updateevent,eventid:id},
        success:function(data){
          console.log(data);
          data=data.trim();
          console.log(data);
          if(data==="UPDATED")
          {
          e.parentNode.parentNode.parentNode.parentNode.remove();
          }
          else
          {
            alert("ERROR");
          }

        }

      });
     
    } 
  </script>
</body>
</html>