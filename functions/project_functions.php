<? 
ob_start();

?>

<?php 
  require('../lib/projects.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_project']))
  {  
     $_projects = new Projects();
     
     $project_name  = $_POST['project_name'];
     $cashid   = $_POST['cashid'];
     $city     = $_POST['city'];
     $address     = $_POST['address'];    
     
     $id = NULL;
     $project_status = $_projects->save($id,$project_name,$cashid,$city,$address);   
      

     header("Location:../projectsList.php");
     
  }
  ///////////////////////////////////////////////////////////////////////////////// 

  

////////////del/////////////////////////////////////////////////////////////////
  if (isset($_GET['del_name']))
  {
    $_enc = new Encryption();
    $_admin = new Admin();

    $admin_id = $_enc->decode($_GET['del_name']); 
    
    $_admin->delete($admin_id); 
    header("Location: ../edit_users.php");     
  }
  /////////////////////////////////////////////////////
  if (isset($_GET['sus']))
  {
    $_enc   = new Encryption();
    $_admin = new Admin();

    $admin_id = $_enc->decode($_GET['sus']); 
    $fileds =array(
      0=> 'suspended'
      );
    $values = array(
       0 => 1
      );
    $counter = count($values);
    $select = 'admin_id';
    $id     = $admin_id;
    $_admin->update_user($fileds,$values,$counter,$select,$id);
    header("Location: ../edit_users.php");     
  }
  /////////////////////////////////////////////////////
  if (isset($_GET['unsus']))
  {
    $_enc   = new Encryption();
    $_admin = new Admin();

    $admin_id = $_enc->decode($_GET['unsus']); 
    $fileds =array(
      0=> 'suspended'
      );
    $values = array(
       0 => 0
      );
    $counter = count($values);
    $select = 'admin_id';
    $id     = $admin_id;
    $_admin->update_user($fileds,$values,$counter,$select,$id);
    header("Location: ../edit_users.php");     
  }

  ///////////////////////////////////////////////////////////////////////////////// 

 if (isset($_POST['add_user_photo']))
 {
    $user_id = $_POST['username'];
    $_user = new User();

     // Image ubload 
     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $rand_dir_name = substr(str_shuffle($chars), 0, 15);
     mkdir("../../wp-content/uploads/userphotos/$rand_dir_name");
     
     move_uploaded_file(@$_FILES["photo"]["tmp_name"],"../../wp-content/uploads/userphotos/$rand_dir_name/".$_FILES["photo"]["name"]);
     $pic_name = @$_FILES["photo"]["name"];
     $pic = 'wp-content/uploads/userphotos/'.$rand_dir_name.'/'.$_FILES["photo"]["name"];
     $id  = NULL;
     $_user->save_photo($id,$pic,$user_id);
     header("Location: ../add_user_photo.php");
     
 }
 /////////////////////////////////////////////////////////////////////////
 //log_user
 if (isset($_POST['log_user']))
 {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $_enc     = new Encryption();
   $_user    = new User();
   $enc_pass = $_enc->encode($password);
   $check_user = $_user->check_login($username,$enc_pass);
   if ($check_user) 
   {
     $search_by = 'username';
     $value     = $username;
     $userdata  = $_user->get_userdata($search_by,$value);
     $_SESSION['username']  = $userdata['username'];
     $_SESSION['userid']    = $userdata['id'];
     $_SESSION['userlogin'] = TRUE;
     $_SESSION['user_log_message'] = 'done login';
     header("Location: ../../my-account/user_photo.php");
   }
   else{
    $_SESSION['user_log_message'] = 'Sorry Username is not available now , contact us for more details';
   }
   //check_login($username,$password)
   //encode($value)
 }

 if (isset($_POST['s_edit_user']))
 {
   $_user    = new User();
   $user_id  = $_POST['username'];
   $userdata = $_user->get_userdata('id',$user_id );
   $_SESSION['userdata'] = $userdata;
   header("Location: ../edit_user.php");
 }

 //////////////////////////////////////////////////////////////////

 if (isset($_POST['update_project']))
 {
   $_project    = new Projects();

   $id           = $_GET['id'];
   $project_name = $_POST['project_name'];
   $cashid       = $_POST['cashid'];
   $city         = $_POST['city'];
   $address      = $_POST['address'];

   $fileds = array(
           0 => 'ProjectName',
           1 => 'CashId',
           2 => 'Place',
           3 => 'Address',
        );
   $values = array(
           0 => $project_name,
           1 => $cashid,
           2 => $city,
           3 => $address,
        );
   $counter = count($values);
   $select = 'ProjectId';
   $_project->update_project($fileds,$values,$counter,$select,$id);
   
  
   header("Location: ../projectsList.php");   
 }
?>

<? ob_flush(); ?>