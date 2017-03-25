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
<div class="row users-row">
<div class="col-sm-12">
<div class="page-title">
<div class="row">
<br><br>
<?php
require_once 'lib/users.php';
require_once 'lib/Encryption.php';
$_users = new Users();
$_enc   = new Encryption();
$users = $_users->get_all(); 
for ($i=0; $i <count($users) ; $i++) 
{ 
    echo '<div class="col-md-5">';
    echo '<div class="user-col"><div class="media"><a class="pull-left" href="#">';
    //user Image
    echo '<img class="media-object img-circle sq100" src="assets/images/avtar-2.jpg" alt="100x100" data-src="holder.js/100x100">';
    echo '</a> <div class="media-body">';
    echo ' <h3 class="follower-name">'.$users[$i]['userName'].'</h3>';
    //User Projects
    echo '<div><i class="fa fa-map-marker"> </i> Projects : </div>';
    echo '<div>'.$users[$i]['userEmail'].'</div>';
    echo '<div class="btn-toolbar"><div class="btn-group">';
    $id = $_enc->encode($users[$i]['id']);
    echo ' <a href="user_data.php?user='.$id.'" class="btn btn-info btn-3d btn-sm">Edit User Data</a>';
    echo '</div><div class="btn-group">';
    if($users[$i]['active'] == 1){
        echo '<a href="functions/user_functions.php?request=disactivate&user='.$users[$i]['id'].'" class="btn btn-success btn-3d btn-sm">Active</a>';
    }
    else{
        echo '<a href="functions/user_functions.php?request=activate&user='.$users[$i]['id'].'" class="btn <btn-danger></btn-danger> btn-3d btn-sm">Inactive</a>';
    }
    echo '<a href="users_projects.php" class="btn btn-primary btn-3d btn-sm">Assign Projects</a>';
    echo '<a href="users_authority.php?user='.$id.'" class="btn btn-primary btn-3d btn-sm" style="background-color: #1c2b82">Authority</a>';
    echo ' </div></div> </div> </div> </div> </div>';
}
?>                    
         
       
    <!-- media-body -->
  

                       
                 

                    




<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>