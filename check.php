<?php
require('connection.inc.php');
require('functions.inc.php');
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
      <?php
      include "css/client.css";
      ?>
     
button{
    border:none;
    outline: none;
    cursor: pointer;
}



.chat-bot{
    max-width: 1100px;
    margin: auto;
    text-align: center;
    padding: 0 1rem;
}


.chat-bot p{
    font-size: 2rem;
}


.chat-btn{
    position: fixed;
    right:50px;
    bottom: 50px;
    background: dodgerblue;
    color: white;
    width:60px;
    height: 60px;
    border-radius: 50%;
    opacity: 0.8;
    transition: opacity 0.3s;
    box-shadow: 0 5px 5px rgba(0,0,0,0.4);
}

.chat-btn:hover, .submit:hover{
    opacity: 1;
}

.chat-popup{
    z-index:100;
    display: none;
    position: fixed;
    bottom:80px;
    right:120px;
    height: 400px;
    width: 300px;
    background-color: white;
    /* display: flex; */
    flex-direction: column;
    justify-content: space-between;
    padding: 0.75rem;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.4);
    border-radius: 10px;
}

.show{
    display: flex;
}

.chat-area{
    height: 80%;
    overflow-y: auto;
    overflow-x: hidden;
}

.income-msg{
    display: flex;
    align-items: center;
}

.avatar{
    width:45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
}

.income-msg .msg{
    background-color: dodgerblue;
    color: white;
    padding:0.5rem;
    border-radius: 25px;
    margin-left: 1rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.4);
}

.input-area{
    position: relative;
    display: flex;
    justify-content: center;
}

input[type="text"]{
    width:100%;
    border: 1px solid #ccc;
    font-size: 1rem;
    border-radius: 5px;
    height: 2.2rem;
}

.submit{
    padding: 0.25rem 0.5rem;
    margin-left: 0.5rem;
    background-color: green;
    color:white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    opacity: 0.7;
}


.out-msg{
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.my-msg{
    display: flex;
    justify-content: flex-end;
    margin: 0.75rem;
    padding: 0.5rem;
    background-color: #ddd;
    border-radius: 25px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.4);
    word-break: break-all;
}


@media (max-width:500px){

    .chat-popup{
        bottom: 100px;
        right:10%;
        width: 80vw;
    }
}
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
      <li class="nav-item active dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link" href="#">Experts <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown dropright d-sm-none d-none d-md-none d-lg-block">
        <a class="nav-link" href="#">Projects</a>
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
       <img src="<?php echo "profilepics/".$row['profile_photo'];?>">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
        ?>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
          <a class="dropdown-item" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
        </div>
      </li>
      <small>Hi, <?php echo $_SESSION['USER_NAME'] ?>!</small>
    </ul>
    <ul class="navbar-nav ml-auto d-sm-block d-block d-md-block d-lg-none">
    <li class="nav-item active">
        <a class="nav-link" href="clientpage.php"><i class="red-icons fas fa-user-tie"></i>&nbsp;&nbsp;Experts<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-tasks"></i>&nbsp;&nbsp;Projects</a>
    </li>
    <li class="nav-item">
    <?php 
        $profile='fa-user red-icons';
        echo "<a class='dropdown-item' href='manage_profile.php?id=".$row['client_id']."'><i class='fas " .$profile ."'></i>&nbsp;&nbsp;Profile</a>"; 
    ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-comment-dots"></i>&nbsp;&nbsp;Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-bell"></i>&nbsp;&nbsp;Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="red-icons fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_signout.php"><i class="red-icons fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
      </li>
    </ul>
  </div>
</nav>

   <!--SORT BY SECTION-->
    <section class="sort">
      <div class="container dropdowns text-center text-uppercase">
        Sort By:
        <div class="dropdown btn-group">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Industry
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"></a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <div class="dropdown btn-group">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Enterprise
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"></a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
    </section>

    <!--SUBJECT MATTER EXPERTS SECTION-->
    <section class="sme">
      <div class="container">
      <div class="row mx-auto">
        <?php
        $get_expert=get_experts($con);
        foreach($get_expert as $list){
        ?>
      <div class="col-lg-4 col-md-6 col-12 d-flex">
      <div class="card py-3 py-sm-0">
        <img src="<?php echo $list['profile-pic']?>" class="card-img-top" alt="...">
        <div class="card-body flex-fill">
          <h5 class="card-title"><?php echo $list['firstname'].' '.$list['lastname']?></h5>
          <h6 class="card-title">Industry: <?php echo $list['industry']?></h6>
          <h6 class="card-title">Enterprise: <?php echo $list['enterprise']?></h6>
          <p class="card-text"><?php echo $list['about_me']?></p>
          <a href="sme_profile.php?id=<?php echo $list['id']?>" class="btn btn-primary mb-2">View Profile</a>
        </div>
      </div>
      </div>
      <?php }?>
     </div>
     
      </div>       
    </section>
    <section class="chat-bot">
    <button class="chat-btn"> 
            <i class="fas fa-comment-dots"></i>
        </button>

        <div class="chat-popup">
            <div class="chat-area">
             <div class="income-msg">
                 <img src="assets/images/robot.png" class="avatar" alt="">
                 <span class="msg"> Hi, How can I help you?</span>
             </div>   
            </div>

            <div class="input-area">
                <input type="text">
                <button class="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </section>

    <!--FOOTER SECTION-->
<?php
require('outerpagefooter.php');
?>  
<script>
const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('input');



// Emoji selection  
      

//   chat button toggler 

chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
})

// send msg 
submitBtn.addEventListener('click', ()=>{
    let userInput = inputElm.value;

    let temp = `<div class="out-msg">
    <span class="my-msg">${userInput}</span>
    <img src="assets/images/p7.jpg" class="avatar">
    </div>`;

    chatArea.insertAdjacentHTML("beforeend", temp);
    inputElm.value = '';

})
</script>
</body>
</html>
