
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php 
        include "css/style.css"
        ?>
        *{
    margin: 0;
    padding: 0;
    font-family: "Open Sans",sans-serif;
    box-sizing: border-box;
}
body{
    
    background-color: rgb(243, 240, 240); 
    
}

.about-section{
   min-height:100vh;
   width:100%;
   display:flex;
   align-items:center;
   justify-content:center;
   background-color:rgb(243, 240, 240); 
}
.about-container{
    width:90%;
    max-width:1000px;
    margin:30px auto;
    padding:20px;
    border-radius:30px;
    box-shadow:0 0 20px 0 rgba(0,0,0,0.3);
    background:rgb(230, 218, 218);
    position:relative;
}
.about-left{
    width:60%;
    height:600px;
    border-radius:10px;
    margin:0 auto;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    }
.about-left img{
    display:block;
    width:400px;
    height:400px;
    margin-top:50px;
    border-radius:10px;
    margin-left:auto;
    margin-right:auto;
}
.about-right{
    width:80%;
    min-height:550px;
    background-color:rgb(230, 218, 218);
    padding:30px;
    border-radius:8px;
    color:rgb(54, 29, 29);
    margin:auto;

}
.about-right h1{
    font-size:40px;
    font-weight:lighter;
}
.about-right p{
    margin:20px 0;
    font-weight:500;
    line-height:25px;
}
.about-right a{
    text-decoration:none;
    text-transform:uppercase;
    background-color:#fff;
    color:#000;
    padding:20px 30px;
    display:inline-block;
    letter-spacing:2px;
    box-shadow:0 0 20px 0 rgba(0,0,0,0.3);
}
.about-right a:hover{
    background-color:rgb(250, 247, 247);
    transform:translateY(-5px);
}
 </style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "outerpageheader.php"?>
    <section class="about-section">
      <div class="about-container">
          <div class="row">
          <div class="col-lg-6 col-md-12 col-12">
          <div class="about-left">
              <img src="assets/images/about.png"></img>
          </div>
          </div>
          <div class="col-lg-6 col-md-12 col-12"> 
          <div class="about-right">
              <div class="about-content">
                  <h1><span style="font-family:'Kaushan Script', cursive;letter-spacing:4px">About Us</span></h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <a href="#" class="btn">Read More</a>
              </div>
          </div>
        </div>
      </div>
  </section>
<?php include "outerpagefooter.php"?>

</body>
</html>