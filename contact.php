
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php include "css/style.css"?>
        *{
    margin: 0;
    padding: 0;
    font-family: "Open Sans",sans-serif;
    box-sizing: border-box;
}
form
{
    width:450px !important;
}
.login-content {
    max-width: 540px;
    margin: 8vh auto; }
  
  .login-form {
    background: #ffffff;
    padding: 30px 30px 20px;
    border-radius: 2px; }
    .login-form .btn {
    width: 100%;
    text-transform: uppercase;
    font-size: 14px;
    padding: 15px;
    border: 0px; }
  
  .login-form label {
    color: #000;
    text-transform: uppercase; }
  
.contactForm{
    width:40%;
    padding:40px;
    background:#fff;
}
.contactForm h2{
    font-size:30px;
    color:#333;
    font-weight:500;
}
.contactForm .inputBox{
    position:relative;
    width:100%;
    margin-top:10px;
}
.contactForm .inputBox input{
    width:100%;
    padding:5px 0;
    font-size:16px;
    margin:10px 0;
    border:none;
    border-bottom:2px solid #333;
    outline:none;
    resize:none;
}
.contactForm .inputBox span{
    position:absolute;
    left:0;
    padding:5px 0;
    font-size:16px;
    margin:10px 0;
    pointer-events:none;
    transition:0.5s;
    color:#666;
}
.contact-banner{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(assets/images/computer.jpg) center/cover no-repeat fixed;
    height:400px;
    
}
.container .contactInfo{
    width:50%;
    display:flex;
    flex-direction:column;
}
.container .contactInfo .box{
    position:relative;
    padding:20px 0;
    display:flex;
}
.container .contactInfo .box .icon{
    min-width:60px;
    height:60px;
    background:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
    font-size:22px;
}
h1
{
  border-bottom:3px solid #800000;  
}

.container .contactInfo .box .text{
    display:flex;
    margin-left:20px;
    font-size:16px;
    color:#fff;
    flex-direction:column;
    font-weight:300;
}
.container .contactInfo .box .text h3{
font-weight:500;
color:#00bcd4;
}

.circle-icon{
    background: #fff;
    padding:30px;
    border-radius: 100px;
    color:#000;
    height:40px;
    width:40px;
    text-align:center;
}
.icon-background{
    color:#fff;
}
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php include "outerpageheader.php"?>
    <section>
        <div class="contact-banner">
            <div class="container">
               
            </div>
        </div>
    </section>
    <section>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-12 col-12 mt-3">
      <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="login-content">
                <div class="login-header text-center">
                <h1><span style="font-family:'Kaushan Script', cursive;letter-spacing:4px;color:#361f19">Contact Us</span></h1>
                </div>
                <div class="login-form">
                    <form method="post">
                    <div class="form-group">
                            <label>Enter full name:</label>
                            <input autocomplete="off" required type="text" class="form-control" placeholder="" name="name">
                        </div>
                        <div class="form-group">
                            <label>Enter email:</label>
                            <input autocomplete="off" required type="email" class="form-control" placeholder="" name="email_id">
                        </div>
                        
                        <div class="form-group">
                            <label>Enter your message:</label>
                            <textarea required rows='5' class="form-control" name="message"></textarea>
                        </div>
                        
                        <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">SEND</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
      <div class="col-lg-6 col-md-12 col-12 mt-3">
      <div class="sufee-login d-flex align-content-center flex-wrap">
        
            <div class="login-content">
                <div class="login-header text-center">
                <h1><span style="font-family:'Kaushan Script', cursive;letter-spacing:4px;color:#361f19">Our Location</span></h1>
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.6985924803394!2d78.45777541397047!3d17.426246488055344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb974ccc655555%3A0x3c93b9a64b3596dc!2sFindfacts%20Innovation%20Centre%20Pvt%20ltd!5e0!3m2!1sen!2sin!4v1622042284448!5m2!1sen!2sin" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        
      </div>
     </div>
</div>
                </div>
     

  </section>
  <?php

  include "outerpagefooter.php";
  ?>

</body>
</html>