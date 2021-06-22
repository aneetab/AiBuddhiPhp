<?php
require('top.inc.php');
$sql="select * from client_users where role='0' and account_status='1'";
$rows=get_data($con,$sql);
$sql="select * from client_users where role='1' and account_status='1'";
$num_clients=get_num_rows($con,$sql);
$sql="select * from client_users where role='2' and account_status='1'";
$num_experts=get_num_rows($con,$sql);
$sql="select * from project_team where status='1'";
$num_projects=get_num_rows($con,$sql);
$sql="select * from article_blog";
$num_posts=get_num_rows($con,$sql);
$sql="select * from project_team where status='0'";
$pending_project=get_num_rows($con,$sql);
$sql="select * from sme_apply,client_users where sme_apply.email=client_users.email_id and sme_apply.status='0' and client_users.account_status='1'";
$pending_expert=get_num_rows($con,$sql);
?>

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
 <div class="container ml-3 p-5" style="border-radius:5px;">
  <div class="row">
	<div class="col-md-3">
		<div class="card card-stats" style="border:3px solid #fbad4c;color:#000;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-2x fa-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Clients</p>
													<h4 class="card-title"><?php echo $num_clients?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats" style="background-color:#59d05d;color:#fff;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)" >
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-2x fa-user-tie"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Experts</p>
													<h4 class="card-title"><?php echo $num_experts?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats" style="background-color:#990c3e;color:#fff;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-2x fa-atom"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Projects</p>
													<h4 class="card-title"><?php echo $num_projects?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats" style="border:3px solid #87186f;color:#000;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
                                                <i class="far fa-2x fa-newspaper"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Articles</p>
													<h4 class="card-title"><?php echo $num_posts?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
                            </div>
    <div class="row mt-5">
	    <div class="col-md-6">
		   <div class="card card-stats" style="border:3px solid #23CCEF;color:#000;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-2x fa-clock"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Project Requests(Pending)</p>
													<h4 class="card-title"><?php echo $pending_project?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-md-6">
		   <div class="card card-stats" style="background:#e68f05;color:#fff;box-shadow:0 0 20px 0 rgba(0,0,0,0.1)">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-2x fa-business-time"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Expert Applications(Pending)</p>
													<h4 class="card-title"><?php echo $pending_expert?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            </div>
							
                            </div>
<?php
require('footer.inc.php');
?>                    
</body>
</html>

