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

<?php 
require_once 'lib/users.php';
require_once 'lib/Encryption.php';
require_once 'lib/userauthority.php';
$_user     = new Users();
$_enc      = new Encryption();
$_userAuth = new UserAuthority();

// get user data 
$id   = $_enc->decode($_GET['user']);
$user = $_user->get_userdata('id',$id);
$username = $user[0]['userName'];

//get all functions 
//for this user 

?>

<div class="page-content-wrapper">
<div class="content-wrapper container">
<div class="row">
<div class="col-sm-12">
<div class="page-title">
<div class="row">
<div class="col-sm-6">
<h4>User Authority fro : <?php echo $username; ?></h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

                  

<div class="row">
    <div class="col-sm-12">
        
        <div class="col-md-12">
                        <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
              <div class="panel-heading">User Authority </div>
                  <div class="panel-body">
                   <?php 
                   ?>
                  </div>
          </div>
          </div>
  </div>         

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>