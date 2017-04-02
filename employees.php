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
        New Employee                                        
       </div>
       <div class="panel-body">
           <form class="form-horizontal" method="post" id="create_emp" name="create_emp" action="functions/emp_functions.php" data-toggle="validator" novalidate="true">
           
           <div class="form-group"><label class="col-lg-2 control-label">Employe Name</label>
               <div class="col-lg-10"><input type="text" name="name" placeholder="Item Name" class="form-control" required=""> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Address</label>
               <div class="col-lg-10"><input type="text" name="address" placeholder="Address" class="form-control"> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Telephone</label>
               <div class="col-lg-10"><input type="text" name="tel" placeholder="Telephone" class="form-control" > 
               </div>
           </div>
            <div class="form-group"><label class="col-lg-2 control-label">Mobile</label>
               <div class="col-lg-10"><input type="text" name="mobile" placeholder="Mobile" class="form-control" > 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Title</label>
               <div class="col-lg-10">
               <select name="title_id" class="form-control" required="">
                 <option value="">please select Title</option>
                 <?php
                   require_once 'lib/emp.php';
                   $_emp   = new Emp();
                   $titles = $_emp->getAllTitles();
                   for ($i=0; $i <count($titles) ; $i++) { 
                       echo '<option value="'.$titles[$i]['Titleid'].'">'.$titles[$i]['TitleName'].'</option>';
                   }                    
                 ?>
               </select>
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Daily Salary</label>
               <div class="col-lg-10"><input type="text" name="salary" placeholder="Daily Salary" class="form-control" required=""> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Notes</label>
               <div class="col-lg-10">
               <textarea name="notes" class="form-control"></textarea>
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