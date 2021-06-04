<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
    $id=get_safe_value($con,$_GET['id']);
    mysqli_query($con,"delete from project_team where team_id='$id'");
  }
?>
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->
  <div class="container ml-3"> 
  <h5 class="box-title">Project Teams Requested </h5>
                      
  <div class="container my-5">

                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th scope="col" width="5%">#</th>
                            <th scope="col" width="23%">Name</th>
                            <th scope="col" width="10%" >Description</th>
                            <th>Date </th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                    <?php
                          $i=1;
                          $sql1="select * from project_team where status='0'";
                          $res1=mysqli_query($con,$sql1);
                          while($row1=mysqli_fetch_assoc($res1)){
                          ?>
                          <tr>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php echo $row1['team_name']?></td>
                          <td><?php echo $row1['team_desc']?></td>
                          <td><?php echo $row1['requested_on']?></td>
                          <td>Applied</td>
                          <td>
                          <a href='viewrequest.php?id=<?php echo $row1['team_id']?>'><i class='fas fa-eye text-primary fa-fw'></i></a>                        
                           <a onclick="return confirm('Are you sure you want to delete this?')" href="projects.php?id=<?php echo $row1['team_id']?>&type=delete"><i class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
                        </td>
                        </tr>
                        <?php $i=$i+1;} ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    <h5 class="box-title">All Project Teams</h5>
                      
                      <div class="container my-5">
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <th scope="col" width="5%">#</th>
                                                <th scope="col" width="23%">Name</th>
                                                <th scope="col" width="10%" >Description</th>
                                                <th>Date </th>
                                                <th>Status</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                        <?php
                                              $i=1;
                                              $sql1="select * from project_team where status='1'";
                                              $res1=mysqli_query($con,$sql1);
                                              while($row1=mysqli_fetch_assoc($res1)){
                                              ?>
                                              <tr>
                                              <th scope="row"><?php echo $i?></th>
                                              <td><?php echo $row1['team_name']?></td>
                                              <td><?php echo $row1['team_desc']?></td>
                                              <td><?php echo $row1['requested_on']?></td>
                                              <td>Approved</td>
                                              <td>
                                              <a href='viewrequest.php?id=<?php echo $row1['team_id']?>'><i class='fas fa-eye text-primary fa-fw'></i></a>                        
                                               <a onclick="return confirm('Are you sure you want to delete this?')" href="projects.php?id=<?php echo $row1['team_id']?>&type=delete"><i class='fas fa-trash text-primary fa-fw mr-3'></i></a>&nbsp;
                                            </td>
                                            </tr>
                                            <?php $i=$i+1;} ?>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                              </div>
   
<?php
require('footer.inc.php');
?>   