<?php
require "top.inc.php";
if(isset($_GET['team_id']) && $_GET['team_id']!='')
{
    $team_id=get_safe_value($con,$_GET['team_id']);
}
?>
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
  <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css " rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 <body>
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
                <i class="fas fa-user-plus mr-3 fa-fw" style="color:#64161d"></i>
                Manage members
            </a>
    </li>
    <li class="nav-item">
    <?php
    $url="admin_library.php?team_id=".$team_id."&channel=general";
    ?>
      <a href="<?php echo $url?>" class="nav-link text-dark">
                <i class="fas fa-file-upload mr-3 fa-fw" style="color:#64161d"></i>
                Add Files
            </a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link text-dark">
                <i class="fas fa-calendar-alt mr-3 fa-fw" style="color:#64161d"></i>
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
 


  <!-- Demo content -->
 

 <div class="container">
   <div style="background-color:#fff;" id="calendar"></div>
 </div>
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
      <div class="form-group">
			<label for="end" class="col-sm-2 control-label">Event Description(Optional)</label>
			<div class="col-sm-10">
		    <textarea autocomplete="off" name="desc" class="form-control" id="desc" rows="3"></textarea>
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
      function go_back()
   {
    var team_id='<?=$team_id?>';
    window.location.href="viewrequest.php?id="+team_id;
    }
 let url='load.php/team_id='+<?php echo $team_id?>;
 $(document).ready(function() {
    $("#ModalAdd").on("hidden.bs.modal",function(){
  $(this).find('#addform').trigger('reset');
	});
  $("#ModalEdit").on("hidden.bs.modal",function(){
  $(this).find('#editform').trigger('reset');
  });
  var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
	$("#sidebar ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("active");
    });

		$('#calendar').fullCalendar({
			header: {
		  	left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay',
			},
			editable: true,
			eventLimit: true, 
			selectable: true,
			selectHelper: true,
            resizable:true,
            eventResize: true,
            eventDurationEditable:true,
            allDayDefault: false,
			select: function(start, end) {
				
				//$('#ModalAdd #picker1').val(moment(start).format('YYYY-MM-DD HH:mm'));
				//$('#ModalAdd').modal('show');
        var today = moment();
        start.set({ hours: today.hours(), minute: today.minutes() });
        $('#ModalAdd #start').val(start.format('YYYY-MM-DD HH:mm'));
        $('#ModalAdd #end').val(end.format('YYYY-MM-DD HH:mm'));
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

			events: 'load.php?team_id='+<?php echo $team_id;?>
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
       doSubmit('<?php echo $team_id?>');
   });
        function doSubmit(team_id){
       $("#ModalAdd").modal('hide');
       var title = $('#title').val();
       var startTime = $('#picker1').val();
       var endTime = $('#picker2').val();
       var team_id=team_id;
       var description=$('#desc').val();
       $.ajax({
           url: 'addEvent.php',
           data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime+"&team_id="+team_id+"&description="+description,
           type: "POST",
           success: function(data) {
			window.location.reload();
            var newEvent = {
                title : title,
                start : startTime,
                end:endTime,
                allDay: false,
                color:'#83c0de',
                team_id:team_id
        
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
  </script>
  <script src="js/main.js"></script>
  </body>
  </html>

