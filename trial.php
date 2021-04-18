
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--------*CSS files*--------->
  <!--font-awesome-->
  <link rel="stylesheet" href="assets/fontawesome-icons/all.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.convform.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--Custom Css file-->
  <style>
      .chat_icon{
          position:fixed;
          right:40px;
          bottom:20px;
          color:#800000;
          cursor:pointer;
          z-index:100;
      }
      .chat_box{
          position:fixed;
          right:20px;
          bottom:100px;
          width:400px;
          height:80vh;
          background:#dedede;
          z-index:100;
          transition:all 0.3s ease-out;
          transform:scaleY(0);
          
      }
      .chat_box.active{
        transform:scaleY(1);
      }
      .conv-form-wrapper textarea{
          height:30px;
          overflow:hidden;
          resize:none;
      }
      #messages{
          padding:20px;
      }
  </style>
  </head>
<body>
<!--ChatBot-->
<div class="chat_icon">
    <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
</div>
<div class="chat_box">
	        <div class="container">
	                    <div class="card no-border">
	                        <div class="conv-form-wrapper">
	                            <form action="" method="GET" class="hidden">
	                                
                                <select name="category" data-conv-question="Hi,how can I help you?">
	<option value="find_expert">Find an expert</option>
	<option value="apply_expert">Apply as an expert</option>
</select>
<div data-conv-fork="category">
	<div data-conv-case="find_expert">
    <input type="text" name="name" data-conv-question="Alright! Please select an industry in which you want to find experts, please.|Okay! Please, tell me the industry to which experts belong.">
	</div>
	<div data-conv-case="apply_expert">
    <input type="text" data-conv-question="OKKK" data-no-answer="true">
	</div>
</div>
	                               
	
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
<!--ChatBot End -->


   

 


 
<script src="assets/fontawesome-icons/all.js"></script>
<!--jQuery file-->
<script src="assets/jquery/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="js/jquery.convform.js"></script>
<!--Bootstrap file-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
<script>
    $(document).ready(function(){
        $('.chat_icon').click(function(event){
            $('.chat_box').toggleClass('active');
        });
    })
</script>
<script>
		jQuery(function($){
			convForm = $('.conv-form-wrapper').convform({selectInputStyle: 'disable'});
			console.log(convForm);
		});
	</script>
</body>
</html>
