
<?php
require('connection.inc.php');
require('functions.inc.php');
$r='';
$msg='';
$email_error='';
$password_error='';
$is_error='';
if(isset($_POST['submit'])){
 $email_id=get_safe_value($con,$_POST['email_id']);
 $password=get_safe_value($con,$_POST['password']);
 if($email_id=='')
 {
   $email_error="Please enter email";
   $is_error='yes';
 }
 if($password=='')
 {
   $password_error="Please enter password";
   $is_error='yes';
 }
 if($is_error=='')
 {
 $password=md5($password);
 $sql="select * from client_users where email_id='$email_id' and password='$password'";
 $res=mysqli_query($con,$sql);
 $count=mysqli_num_rows($res);
 $row=mysqli_fetch_assoc($res);
 if($count>0){
   $_SESSION['USER_LOGIN']='yes';
   $_SESSION['USER_EMAIL']=$email_id;
   $_SESSION['USER_NAME']=$row['firstname'];
   $_SESSION['USER_LNAME']=$row['lastname'];
   $_SESSION['USER_ID']=$row['client_id'];
   $status = "Active now";
   $id=$row['client_id'];
   $sql2 = mysqli_query($con, "UPDATE client_users SET status = '$status' WHERE client_id ='$id'");
   if($row['role']=='1')
   {
   $_SESSION['USER_ROLE']='client';
   $r='1';
   }
   else
   {
    $_SESSION['USER_ROLE']='sme';
    $r='2';  
   }
   if($r=='1')
   {
   header('location:clientpage.php');
   die();
   }
   if($r=='2')
   {
    header('location:sme_application.php');
    die();  
   }

 }
 else{
   $msg="Please enter correct login credentials!";
 }
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600;1,700&display=swap" rel="stylesheet">
    <style>
      <?php
      include "css/style.css";
      ?>
    </style>
</head>
<body>
<div class="header" id="topheader">

<!--BOOTSTRAP Responsive Navbar-->
<?php
require('outerpageheader.php');
?> 

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <svg id="b104a006-16bb-4699-b4ef-02ba23a3b790" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 743.40429 753.13373"><title>happy feeling</title><path d="M884.02338,360.16127C842.39655,196.47512,698.56275,78.31661,529.733,73.57737c-89.25523-2.50549-183.17665,27.0965-251.55836,130.68464-122.23971,185.175,7.51191,313.13661,97.97131,373.94142A566.02694,566.02694,0,0,1,493.14148,683.35864c61.10238,72.50779,178.64943,162.60891,318.64265,21.43431C913.25139,602.46943,911.751,469.19242,884.02338,360.16127Z" transform="translate(-228.29785 -73.43313)" fill="#f2f2f2"/><path d="M955.20863,737.06376c0,32.26235-151.72264,89.50311-338.882,89.50311s-321.118-115.99853-321.118-148.26087,133.95866,31.42857,321.118,31.42857S955.20863,704.80141,955.20863,737.06376Z" transform="translate(-228.29785 -73.43313)" fill="#3f3d56"/><path d="M955.20863,737.06376c0,32.26235-151.72264,89.50311-338.882,89.50311s-321.118-115.99853-321.118-148.26087,133.95866,31.42857,321.118,31.42857S955.20863,704.80141,955.20863,737.06376Z" transform="translate(-228.29785 -73.43313)" opacity="0.1"/><path d="M955.20863,736.72215c0,32.26234-151.72264,58.41614-338.882,58.41614s-321.118-84.56995-321.118-116.83229,133.95866,0,321.118,0S955.20863,704.4598,955.20863,736.72215Z" transform="translate(-228.29785 -73.43313)" fill="#3f3d56"/><g opacity="0.7"><path d="M943.99062,249.26589c-12.292,23.85838-51.25117,51.97188-75.10956,39.67987s-23.58129-60.33479-11.28929-84.19317a48.59577,48.59577,0,0,1,86.39885,44.5133Z" transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M870.89964,295.25478a8.05032,8.05032,0,0,0-8.32759-4.29044l4.29043-8.3276,8.3276,4.29044Z" transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M864.83,286.63541a10.30467,10.30467,0,0,0,8.36009,4.26389" transform="translate(-228.29785 -73.43313)" fill="none" stroke="#2f2e41" stroke-miterlimit="10" stroke-width="2"/><ellipse cx="928.13292" cy="218.04387" rx="12.29531" ry="10.2461" transform="translate(80.9232 869.8155) rotate(-62.74216)" fill="#fff" opacity="0.4"/><line x1="640.35992" y1="215.81139" x2="604.10504" y2="307.04377" fill="none" stroke="#2f2e41" stroke-miterlimit="10" stroke-width="2"/></g>
                  <path d="M951.644,395.61836c-26.91169,27.1498-91.8722,48.66484-119.022,21.75315s-6.20783-92.05921,20.70387-119.209A69.21723,69.21723,0,0,1,951.644,395.61836Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#ff6584"/><path d="M832.66353,426.8064a11.46647,11.46647,0,0,0-9.47645-9.39334l9.39334-9.47644,9.47645,9.39333Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#ff6584"/><path d="M828.10753,412.49875a14.67743,14.67743,0,0,0,9.532,9.37117" 
                  transform="translate(-228.29785 -73.43313)" fill="none" stroke="#2f2e41" stroke-miterlimit="10" 
                  stroke-width="2"/><line x1="602.51563" y1="346.22772" x2="513.27994" y2="436.25297" fill="none" 
                  stroke="#2f2e41" stroke-miterlimit="10" stroke-width="2"/><ellipse cx="943.46642" cy="346.41508" 
                  rx="17.51279" ry="14.594" transform="translate(-195.04707 699.17413) rotate(-45.25236)" fill="#fff" 
                  opacity="0.4"/><path d="M867.5301,307.663c-8.86788,37.18484-53.16533,89.34326-90.35016,80.47538s-53.17592-75.404-44.308-112.58879A69.21723,69.21723,0,0,1,867.5301,307.663Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M782.12185,396.17556a11.46645,11.46645,0,0,0-12.9791-3.09527l3.09527-12.9791,12.9791,3.09526Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M770.79,386.324a14.6774,14.6774,0,0,0,13.015,3.04747" 
                  transform="translate(-228.29785 -73.43313)" fill="none" stroke="#2f2e41" stroke-miterlimit="10" 
                  stroke-width="2"/><ellipse cx="834.95809" cy="269.88867" rx="17.51279" ry="14.594" transform="translate(150.44384 946.02975) rotate(-76.58659)" 
                  fill="#fff" opacity="0.4"/><line x1="548.67563" y1="317.585" x2="519.27091" y2="440.8851" fill="none" 
                  stroke="#2f2e41" stroke-miterlimit="10" stroke-width="2"/><g opacity="0.8"><path d="M455.36207,633.71133c-19.33018,18.81-65.42983,33.16077-84.23986,13.83059s-3.20748-65.02133,16.12269-83.83137a48.83661,48.83661,0,0,1,68.11717,70.00078Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M371.03143,654.1982a8.09023,8.09023,0,0,0-6.56551-6.74706l6.74706-6.56551,6.56551,6.74706Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#9c0e31"/><path d="M367.99956,644.047a10.35577,10.35577,0,0,0,6.60494,6.73213" 
                  transform="translate(-228.29785 -73.43313)" fill="none" stroke="#2f2e41" stroke-miterlimit="10" stroke-width="2"/>
                  <ellipse cx="450.21956" cy="598.89724" rx="12.35625" ry="10.29687" transform="translate(-518.41331 410.22687) rotate(-44.21867)" 
                  fill="#fff" opacity="0.4"/></g><path d="M436.85861,163.88584h13.58021a33.5923,33.5923,0,0,1,33.5923,33.5923v47.17251a0,0,0,0,1,0,0H403.2663a0,0,0,0,1,0,0V197.47815A33.5923,33.5923,0,0,1,436.85861,163.88584Z" 
                  fill="#2f2e41"/><path d="M626.60927,447.61614,616.41655,469.0459s-8.30778,28.788,1.10579,31.8654,11.25109-29.542,11.25109-29.542l7.79675-21.6001Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#ffb9b9"/><path d="M626.60927,447.61614,616.41655,469.0459s-8.30778,28.788,1.10579,31.8654,11.25109-29.542,11.25109-29.542l7.79675-21.6001Z" transform="translate(-228.29785 -73.43313)" opacity="0.1"/><polygon points="400.242 340.643 387.351 385.76 407.762 396.502 407.762 342.791 400.242 340.643" fill="#575a89"/><path d="M663.452,294.30051s-1.07422,17.18751-3.22266,17.18751-6.44531,20.41016-6.44531,20.41016l18.26172,11.81641,22.5586-20.41016L688.159,307.19114s-3.22266-6.44531-2.14844-12.89063S663.452,294.30051,663.452,294.30051Z" transform="translate(-228.29785 -73.43313)" fill="#ffb9b9"/><path d="M663.452,294.30051s-1.07422,17.18751-3.22266,17.18751-6.44531,20.41016-6.44531,20.41016l18.26172,11.81641,22.5586-20.41016L688.159,307.19114s-3.22266-6.44531-2.14844-12.89063S663.452,294.30051,663.452,294.30051Z" transform="translate(-228.29785 -73.43313)" opacity="0.1"/><path d="M731.1278,465.10135l2.14844,23.63282s7.51954,29.00392,17.18751,26.85548-5.3711-31.15236-5.3711-31.15236l-4.29687-22.5586Z" transform="translate(-228.29785 -73.43313)" fill="#ffb9b9"/><path d="M684.93638,698.2069s6.44532,39.7461,2.14844,47.26564,4.29688,8.59375,4.29688,8.59375L717.163,747.621V735.80456s-8.59376-38.67188-8.59376-40.82032S684.93638,698.2069,684.93638,698.2069Z" transform="translate(-228.29785 -73.43313)" fill="#ffb9b9"/><path d="M632.29965,519.88653s7.51953,77.34377,19.33594,102.05081,22.5586,92.38284,27.9297,93.45706,46.19142-6.44531,51.56251-10.74219-36.52345-108.49613-36.52345-109.57035-9.668-96.67972-9.668-96.67972l-12.89063-21.48438Z" transform="translate(-228.29785 -73.43313)" fill="#2f2e41"/><path d="M632.29965,519.88653s7.51953,77.34377,19.33594,102.05081,22.5586,92.38284,27.9297,93.45706,46.19142-6.44531,51.56251-10.74219-36.52345-108.49613-36.52345-109.57035-9.668-96.67972-9.668-96.67972l-12.89063-21.48438Z" transform="translate(-228.29785 -73.43313)" opacity="0.1"/><path d="M694.60435,743.3241s-10.74219-5.3711-12.89063-2.14844L673.12,754.06629s-36.52345,17.1875-23.63282,19.33594,37.59767,2.14844,40.82033,0,38.67189-21.48438,37.59767-22.5586-9.668-23.63282-10.74219-21.48438S701.04967,747.621,694.60435,743.3241Z" transform="translate(-228.29785 -73.43313)" fill="#2f2e41"/><path d="M514.13555,652.01547s-24.707,17.18751-36.52345,13.96485,0,23.63282,0,23.63282l21.48438,11.81641,6.44531-5.37109s22.5586-30.07814,32.22658-31.15236S514.13555,652.01547,514.13555,652.01547Z" transform="translate(-228.29785 -73.43313)" 
                  fill="#ffb9b9"/><path d="M625.85433,455.43338l4.29688,22.5586L549.58478,600.453s-48.33986,48.33986-44.043,53.711,31.15236,36.52345,37.59767,32.22658S698.90123,520.96074,697.827,499.47636s-36.52345-62.30471-36.52345-62.30471l-35.44923,16.11329Z" transform="translate(-228.29785 -73.43313)" fill="#2f2e41"/><path d="M482.98319,673.49986s9.668-10.74219,4.29688-11.81641a160.38968,160.38968,0,0,0-18.26173-2.14844c-2.14844,0-31.15235-15.03907-33.30079-9.668s12.89063,33.30079,21.48438,36.52345S496.948,712.17174,496.948,712.17174s16.11329-13.96484,13.96485-17.1875S478.68631,685.31627,482.98319,673.49986Z" transform="translate(-228.29785 -73.43313)" fill="#2f2e41"/><circle cx="443.7479" cy="205.82831" r="25.78126" fill="#ffb9b9"/>
                  <path d="M677.41685,317.93333s-18.26173,1.07422-23.63282-2.14843-17.18751,44.043-17.18751,44.043L629.077,422.13259s-1.07422,7.51953,0,11.81641-10.74219-2.14844-6.44532,9.668-3.22265,17.1875,4.29688,18.26172,47.26564-15.03906,47.26564-15.03906l18.26173-95.6055,5.37109-38.67189Z" transform="translate(-228.29785 -73.43313)" fill="#d0cde1"/><path d="M661.53142,309.20666s-9.89583-2.01552-13.11849.13292-15.03906,18.26173-15.03906,22.5586-4.29688,51.56252-4.29688,55.8594-3.22266,26.85547-3.22266,29.00391,2.75539,11.38223,2.75539,11.38223l6.91258-12.45645s-2.14843-16.11328,5.3711-41.89454S661.53142,309.20666,661.53142,309.20666Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#575a89"/><path d="M672.04575,325.45287s14.35058-22.5586,15.23193-20.41016,16.99465,5.37109,16.99465,5.37109,29.00391,20.41016,26.85547,29.00392-17.1875,73.0469-17.1875,73.0469-13.96485,33.30079-3.22266,56.93361-2.14844,32.22657-2.14844,32.22657-8.59375,4.29688-6.44531,8.59375-24.707,20.41017-27.9297,8.59376-42.96876-82.71487-34.375-108.49613S672.04575,325.45287,672.04575,325.45287Z" transform="translate(-228.29785 -73.43313)" 
                  fill="#575a89"/><path d="M725.75671,336.19506s11.81641,22.5586,9.668,25.78126,7.51953,22.5586,7.51953,22.5586a7.4393,7.4393,0,0,0,0,5.37109c1.07422,3.22266,7.51954,17.18751,7.51954,22.55861s-1.07422,22.5586,0,30.07813,15.03906,25.78126,3.22265,26.85548-31.15235,10.74219-30.07813,0,4.29688-36.52345,0-40.82033-7.51953-4.29687-5.3711-9.668-9.668-19.33594-9.668-19.33594Z" 
                  transform="translate(-228.29785 -73.43313)" fill="#575a89"/><polygon points="465.29 199.477 424.514 199.477 415.281 178.259 472.215 178.259 465.29 199.477" fill="#2f2e41"/><ellipse cx="645.93755" cy="283.17697" rx="2.05334" ry="5.47558"
                   transform="translate(-281.58989 117.53485) rotate(-16.16012)" fill="#ffb9b9"/><ellipse cx="697.27112" cy="283.17697" rx="5.47558" ry="2.05334" transform="translate(2.919 800.6496) rotate(-73.83988)" fill="#ffb9b9"/><path d="M940.20863,692.41188c0,24.9524-14.83239,33.66445-33.13,33.66445-.42525,0-.85051-.00575-1.27008-.0115q-1.27575-.03447-2.517-.12066c-16.51615-1.16661-29.34292-10.32692-29.34292-33.53229,0-24.00988,30.67613-54.30675,32.99209-56.55946a.00563.00563,0,0,0,.00575-.00575c.08621-.08047.13216-.12641.13216-.12641S940.20863,667.45952,940.20863,692.41188Z" transform="translate(-228.29785 -73.43313)" 
                   fill="#f2f2f2"/>
                   <path d="M905.87182,722.26048l12.11411-16.92989-12.14287,18.78612-.03452,1.94812q-1.27575-.03447-2.517-.12066l1.30452-24.95812-.01151-.1954.023-.03448.12641-2.3619-12.17739-18.8321,12.21184,17.06209.02876.50571.98842-18.86082L895.361,658.80492l10.55109,16.14835,1.02862-39.10085.00575-.13216v.12641l-.17236,30.83706,10.37858-12.22334-10.4246,14.87833-.27008,16.88966,9.689-16.2058-9.72927,18.6884-.15517,9.3902,14.068-22.556-14.11972,25.83163Z" transform="translate(-228.29785 -73.43313)"
                    fill="#3f3d56"/></svg>
                </div>
                <div class="login-form">
                <h5 class="text-center text-uppercase my-2">Welcome back to AiBuddhi!</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Enter email:</label>
                            <input autocomplete="off" required type="email" class="form-control" placeholder="Email" name="email_id">
                        </div>
                        <small><?php echo $email_error?></small>
                        <div class="form-group">
                            <label>Enter password:</label>
                            <input required type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <small><?php echo $password_error?></small>
                        <small><?php echo $msg?></small>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="#">Forgot Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Log in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="fab fa-facebook-f"></i>Sign in with facebook</button>
                                <button type="button" class="btn social google btn-flat btn-addon mt-2"><i class="fab fa-google"></i></i>Sign in with google</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>New to AiBuddhi ? <a href="client_signup.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>    
<script>
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
	$("#navbar ul li a").each(function(){
		 if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		 $(this).addClass("active");
    })
</script>

</body>
</html>
