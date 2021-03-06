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
<title>Job Titles</title>
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
<h4>Job Title</h4>
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
          New Job Title                                        
         </div>
         <div class="panel-body">
            
             <form class="form-horizontal" method="post" id="create_jobTitle" name="create_jobTitle" action="functions/emp_functions.php" data-toggle="validator" novalidate="true">
             
             <div class="form-group"><label class="col-lg-2 control-label">Job Title</label>
                 <div class="col-lg-10"><input type="text" name="title_name" placeholder="Title Name" class="form-control" required=""> 
                 </div>
             </div>
             <div class="form-group"><label class="col-lg-2 control-label">Description / Notes</label>
                 <div class="col-lg-10">
                 <textarea name="notes" class="form-control" ></textarea>
                 </div>
             </div>          
            
             <div class="form-group">
                 <div class="col-lg-offset-2 col-lg-10">
                     <button id="create_jobTitle" name="create_jobTitle" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
                 </div>
             </div>
         </form>
         </div>
     </div>
 </div>                      
<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>