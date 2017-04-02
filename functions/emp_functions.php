<? 
ob_start();

?>

<?php 
  require('../lib/emp.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_jobTitle']))
  {  
     $_emp = new Emp();
     
     $title_name  = $_POST['title_name'];
     $notes       = $_POST['notes'];     
     $id = NULL;
     $emp_status = $_emp->save_title($id,$title_name,$notes);   
      

     header("Location:../titlesList.php");
     
  }
  ///////////////////////////////////////////////////////////////////////////////// 

  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_emp']))
  {  
     $_emp = new Emp();
     
     $name     = $_POST['name'];
     $address  = $_POST['address'];
     $tel      = $_POST['tel'];
     $mobile   = $_POST['mobile'];
     $title_id = $_POST['title_id'];
     $salary   = $_POST['salary'];
     $notes    = $_POST['notes'];

     $id = NULL;
     $emp_status = $_emp->save($id,$name,$address,$tel,$mobile,$title_id,$salary,$notes);   
      

     header("Location:../empList.php");
     
  }

  

  ////////////del/////////////////////////////////////////////////////////////////
  if (isset($_GET['del_title']))
  {
    $_enc = new Encryption();
    $_emp = new Emp();
    $id = $_enc->decode($_GET['del_title']); 
    
    $_emp->deleteTitle($id); 
    header("Location: ../titlesList.php");     
  }

   ////////////del/////////////////////////////////////////////////////////////////
  if (isset($_GET['del_emp']))
  {
    $_enc = new Encryption();
    $_emp = new Emp();
    $id = $_enc->decode($_GET['del_emp']); 
    
    $_emp->delete($id); 
    header("Location: ../empList.php");     
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

 if (isset($_POST['update_jobTitle']))
 {
   $_emp  = new Emp();
   $_enc  = new Encryption();

   $id = $_enc->decode($_GET['e']);
   $TitleName = $_POST['title_name'];
   $Notes     = $_POST['notes'];
   
   
   $fileds = array(
           0 => 'TitleName',
           1 => 'Notes'
        );
   $values = array(
           0 => $TitleName,
           1 => $Notes
        );
   $counter = count($values);
   $select = 'Titleid';
   $_emp->updateTitle($fileds,$values,$counter,$select,$id);  
      
   header("Location: ../titlesList.php");   
 }

 /////////////////////////////////////////////////////////////////////////////////////////
 if (isset($_POST['update_emp']))
 {
   $_emp  = new Emp();
   $_enc  = new Encryption();
   
   $name     = $_POST['name'];
   $address  = $_POST['address'];
   $tel      = $_POST['tel'];
   $mobile   = $_POST['mobile'];
   $title_id = $_POST['title_id'];
   $salary   = $_POST['salary'];
   $notes    = $_POST['notes'];
   
   
   $fileds = array(
           0 => 'EmpName',
           1 => 'Address',
           2 => 'Telephone',
           3 => 'mobile',
           4 => 'Titleid',
           5 => 'Daliy_price',
           6 => 'notes'
        );
   $values = array(
           0 => $name,
           1 => $address,
           2 => $tel,
           3 => $mobile,
           4 => $title_id,
           5 => $salary,
           6 => $notes
        );
   $counter = count($values);
   $select = 'Empid';
   $id = $_GET['e'];
   $_emp->update_emp($fileds,$values,$counter,$select,$id);  
      
   header("Location: ../empList.php");   
 }

     

?>

<? ob_flush(); ?>