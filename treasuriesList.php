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
<title>Treasuries</title>
<?php
  require_once 'inc/header.php';
  require_once 'inc/page_header.php';
  require_once 'inc/menu.php';
?>

<div class="page-content-wrapper">
<div class="content-wrapper container">
<div class="row users-row">
<div class="col-sm-12">
<div class="page-title">
<div class="row">
<br><br>
<?php
require_once 'lib/treasury.php';
require_once 'lib/Encryption.php';
$_tr = new Treasury();
$trs = $_tr->getAll(); 
for ($i=0; $i <count($trs) ; $i++) 
{ 
    echo '<div class="col-md-5">';
    echo '<div class="user-col"><div class="media"><a class="pull-left" href="#">';
    //user Image
    echo '<img class="media-object img-circle sq100" src="assets/images/tr.jpg" alt="100x100" data-src="holder.js/100x100">';
    echo '</a> <div class="media-body">';
    echo ' <h3 class="follower-name">'.$trs[$i]['cashName'].'</h3>';
    //User Projects
    echo '<div>LE.  '.$trs[$i]['balance'].'</div>';
    echo '<div class="btn-toolbar"><div class="btn-group">';
   // echo ' <a href="user_data.php?user='.$id.'" class="btn btn-info btn-3d btn-sm">Edit User Data</a>';
    echo '</div><div class="btn-group">';

    echo '<a href="treasury_data.php?t='.$trs[$i]['cashId'].'" class="btn btn-primary btn-3d btn-sm">Edit</a>';
    //echo '<a href="treasury_data.php?user='.$id.'" class="btn btn-primary btn-3d btn-sm" style="background-color: #1c2b82">Authority</a>';
    echo ' </div></div> </div> </div> </div> </div>';
}
?>                    
         
       
    <!-- media-body -->
  

                       
                 

                    




<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>