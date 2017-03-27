<? 
ob_start();

?>

<?php 
  require('../lib/treasury.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_treasury']))
  {  
     $_treasury = new Treasury();
     
     $cashName  = $_POST['cashName'];
     $balance   = $_POST['balance'];
     $notes     = $_POST['notes'];
     session_start();
     $user_id   = $_SESSION['user_id'];    
     
     $id = NULL;
     $treasury_status = $_treasury->save($id,$cashName,$balance,$user_id,$notes);
     
      

     header("Location:../treasuriesList.php");
     
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

 if (isset($_POST['update_treasury']))
 {
   $_tr    = new Treasury();

   $id = $_GET['t'];
   $cashname = $_POST['cashName'];
   $balance  = $_POST['balance'];
   $notes    = $_POST['notes'];
      

   $fileds = array(
           0 => 'cashName',
           1 => 'balance',
           2 => 'notes'
        );
   $values = array(
           0 => $cashname,
           1 => $balance,
           2 => $notes
        );
   $counter = count($values);
   $select = 'cashId';
   $_tr->update_treasury($fileds,$values,$counter,$select,$id);   
    
   header("Location: ../treasuriesList.php");   
 }
?>

<? ob_flush(); ?>