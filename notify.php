<?php
require('top.inc.php');
if(isset($_GET['id']) && $_GET['id']!='' && isset($_GET['msg']) && $_GET['msg']!='')
{
    $id=$_GET['id'];
    $msg=urldecode($_GET['msg']);
    echo $msg;
    
}
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
  <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Message from:</label>
                            <input autocomplete="off" required type="text" class="form-control" placeholder="Sender Name" name="from">
                        </div>
                        <div class="form-group">
                            <label>Message to:</label>
                            <input autocomplete="off" required type="email" class="form-control" placeholder="Receiver Email" name="to">
                        </div>
                        <div class="form-group">
                        <label>Message:</label>
                        <textarea class="form-control rounded-0" id="message" name="message" rows="5"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Send</button>
                      </form>
                </div>
            </div>
        </div>
    </div>                       
<?php
require('footer.inc.php');
?>                    
</body>
</html>

