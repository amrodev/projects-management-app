<? 
ob_start();
session_start();
?>

<?php 
  require('../lib/users.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_user']))
  {  
     $_user = new Users();
     
     $username  = $_POST['username'];
     $email     = $_POST['email'];
     $password  = $_POST['password'];
     $level     = $_POST['level'];
     $active    = 1;

     
       $is_user = $_user->is_username($username);
       if ($is_user) {
         //$_SESSION['User_message']      = 'Sorry , User is exist';
         //$_SESSION['User_status'] = 'fail';
       }
       else{
        $id = NULL;
        $_enc = new Encryption();
        $enc_password = $_enc->encode($password);
        $add_user = $_user->save($id,$level,$username,$email,$enc_password,$active);
        if ($add_user) {
          $_SESSION['User_message']      = 'Adding user is successfully done';
          $_SESSION['User_status'] = 'done';
          }
        else{
          $_SESSION['User_message']      = 'Something wrong on database , please contact mips team';
          $_SESSION['User_status'] = 'fail';
        }
        
       }
      

     header("Location:../usersList.php");
     
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

 if (isset($_POST['update_user']))
 {
   $_admin    = new Users();
   $_enc      = new Encryption();

   $id = $_GET['userid'];
   $username = $_POST['username'];
   $email    = $_POST['email'];
   $level    = $_POST['level']; 
   $fileds = array(
           0 => 'userName',
           1 => 'userEmail',
           2 => 'userLevel'           
        );
   $values = array(
           0 => $username,
           1 => $email,
           2 => $level          
        );
   $counter = count($values);
   $_admin->update_user($fileds,$values,$counter,'id',$id);
   $enc_id = $_enc->encode($id);
      
   header("Location: ../user_data.php?user=$enc_id");   
 }

 if (isset($_GET['request'])) 
 {
   $_user = new Users();
   $request = $_GET['request'];
   $id = $_GET['user'];
   if ($request == 'disactivate') {
     $fileds = array(
             0 => 'active'           
          );
     $values = array(
             0 => '0',
          );
     $counter = count($values);
     $_user->update_user($fileds,$values,$counter,'id',$id);
     header("Location: ../usersList.php");
   }
   elseif($request == 'activate'){
      $fileds = array(
             0 => 'active'           
          );
     $values = array(
             0 => '1',
          );
     $counter = count($values);
     $_user->update_user($fileds,$values,$counter,'id',$id);
     header("Location: ../usersList.php");
   }
 }
?>

<? ob_flush(); ?>