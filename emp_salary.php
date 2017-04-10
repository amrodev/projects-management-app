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
<title>Employees</title>
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
<h4>Employees</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->
                 

<div class="row">
   <div class="col-md-10">
   <div class="panel panel-card margin-b-30">
       <!-- Start .panel -->
       <div class="panel-heading">
        Employee Salary                                        
       </div>
       <div class="panel-body">
           <form class="form-horizontal" method="post" id="create_emp" name="create_emp" action="functions/emp_functions.php" data-toggle="validator" novalidate="true">
           
           <div class="form-group"><label class="col-lg-2 control-label">Employee Name</label>
               <div class="col-lg-10">
               <select name="name" class="form-control" required="">
                <option value="">please select Employee</option>
               <?php 
                 require_once 'functions/trans_config.php';
                 for ($i=0; $i <count($employee) ; $i++) { 
                     echo '<option value="'.$employee[$i]['EmpId'].'">'.$employee[$i]['EmpName'].'</option>';
                 }
               ?>               
               </select> 
               </div>
           </div>
          <div class="form-group"><label class="col-lg-2 control-label">Project</label>
               <div class="col-lg-10">
               <select name="name" class="form-control" required="">
                <option value="">please select Project</option>
                <?php 
                
                 for ($i=0; $i <count($projects) ; $i++) { 
                     echo '<option value="'.$projects[$i]['ProjectId'].'">'.$projects[$i]['ProjectName'].'</option>';
                 }
               ?>   
               </select> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Salary</label>
               <div class="col-lg-10"><input type="text" name="sal" placeholder="Salary" class="form-control" > 
               </div>
           </div>           
           
           
           <div class="form-group">
               <div class="col-lg-offset-2 col-lg-10">
                   <button id="create_emp" name="create_emp" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
               </div>
           </div>
           
       </form>
       </div>
   </div>
  </div>                      

<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>