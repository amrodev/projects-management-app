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
<title>Users</title>
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
<h4>Users Management </h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

<?php 
  require_once 'lib/users.php';
  require_once 'lib/Encryption.php';
  $_user = new Users();
  $_enc = new Encryption();
  
  $id = $_GET['user'];
  $userId = $_enc->decode($id);
  $user = $_user->get_userdata('id',$userId);
?>
                 

<div class="row">
   <div class="col-md-10">
 <div class="panel panel-card margin-b-30">
     <!-- Start .panel -->
     <div class="panel-heading">
      Edit user                                        
     </div>
     <div class="panel-body">
         <form class="form-horizontal" method="post" id="update_user" name="update_user" action="functions/user_functions.php?userid=<?php echo $userId; ?>" data-toggle="validator" novalidate="true">
         
         <div class="form-group"><label class="col-lg-2 control-label">username</label>
             <div class="col-lg-10"><input type="text" name="username" value="<?php echo $user[0]['userName']; ?>" class="form-control" required=""> 
             </div>
         </div>
         <div class="form-group"><label class="col-lg-2 control-label">Email</label>
             <div class="col-lg-10"><input type="text" id="email" name="email" value="<?php echo $user[0]['userEmail']; ?>"  class="form-control" required=""> 
             </div>
         </div>
        

         <div class="form-group"><label class="col-lg-2 control-label">level</label>
             <div class="col-lg-10">
             <select class="form-control m-b" id="level" name="level" required="">
                     <option value="">select user type</option>
                     <option value="1">Admin</option>
                     <option value="2">User</option>
                 </select>
             </div>
         </div>
         
         
         <div class="form-group">
             <div class="col-lg-offset-2 col-lg-10">
                 <button id="update_user" name="update_user" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
             </div>
         </div>
     </form>


     </div>
 </div>
iv>                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>