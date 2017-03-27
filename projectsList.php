<?php 
ob_start();
session_start();
if($_SESSION['user_login'])
{
}
else{
    header("Location: index.php");
}
require_once "languages/common.php";

?>
<!DOCTYPE html>
<html lang="en">    
<head>
<meta charset="utf-8" />
<title>Project Management App</title>
<?php
  require_once 'inc/header.php';
  require_once 'inc/page_header.php';
  require_once 'inc/menu.php';
?>

<div class="page-content-wrapper">
<div class="content-wrapper container">
<div class="row">
<div class="col-sm-12">
<div class="page-title">
<div class="row">
<div class="col-sm-6">
<h4>Projects List</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

                  

                    
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        Projects                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Project Name</th>
                                                        <th>Treasury</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>
                                                <?php
                                                  require_once 'lib/DB.php';
                                                  $_db = new Database();
                                                  $selects = "projects.ProjectId,projects.ProjectName,treasury.cashName,projects.place,projects.Address ";
                                                  $OnStatement = " projects.CashId = treasury.cashId ";
                                                  $projects = $_db->InnerJoin('projects','treasury',$selects,$OnStatement,"");
                                                  for ($i=0; $i <count($projects) ; $i++) 
                                                  { 
                                                      //ProjectId
                                                      echo '<tr>';
                                                      echo "<td>".$projects[$i]['ProjectName']."</td>";
                                                      echo "<td>".$projects[$i]['cashName']."</td>";
                                                      echo "<td>".$projects[$i]['place']."</td>";
                                                      echo "<td>".$projects[$i]['Address']."</td>";
                                                      echo '<td>
                                                             <a href="project_data.php?p='.$projects[$i]['ProjectId'].'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                             <a href="" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                            </td>';
                                                     
                                                      echo '</tr>';
                                                  }
                                                ?>                                                      
                                                   
                                                </tbody>
                                                 
                                            </table>
                                        </div>




                                    </div>
                                </div><!-- End .panel --> 


                            </div>

                        </div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>