$(function() { 
	$('#sidebarCollapse').on('click', function() {
	  $('#sidebar, #content').toggleClass('active');
	});
  });
  function change_bg(e)
  {
	  e.toggleClass('bg-light');
  }
  
  $(function() {
	var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
	$("#sidebar ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("bg-light");
	})
});
function user_register(){
	jQuery('.field_error').html('');
	is_error='yes';
	var username=jQuery("#username").val();
	var email=jQuery("#email_id").val();
	var password=jQuery("#password").val();
	var cpassword=jQuery("#cpassword").val();
	if(username=="")
	{
		jQuery('#email_error').html('Please enter username');
	  is_error='yes';
	}
	if(email==""){
      jQuery('#email_error').html('Please enter email');
	  is_error='yes';
	}
	if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(cpassword==""){
		jQuery('#cpassword_error').html('Please confirm password');
		is_error='yes';
	}
	if(password!=cpassword)
	{
		jQuery('#cpassword_error').html("Password doesn't match");
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'register_submit.php',
			type:'post',
			data:'username='+username+'&email='+email+'&password='+password,
			success:function(result){
				if(result=='present'){
					jQuery('#email_error').html('Email id already exists');
				}
				if(result=='insert'){
					jQuery('.register-link p').html('Thank you for registering to AiBuddhi!');
				}
			}
		})
	}
	

}