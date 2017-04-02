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
<h4>Welcome to Project Management App</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

                  

<div class="row">
    <div class="col-sm-12">
        Content Here
     </div>
                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>