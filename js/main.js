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
