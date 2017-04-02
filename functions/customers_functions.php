<? 
ob_start();

?>

<?php 
  require('../lib/customers.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  

  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_cust']))
  {  
     $_emp = new Customers();
     
     $name     = $_POST['name'];
     $city      = $_POST['city'];
     $address  = $_POST['address'];
     $tel  = $_POST['tel'];      
     $mobile   = $_POST['mobile'];     
     $notes    = $_POST['notes'];

     $id = NULL;
     $emp_status = $_emp->save($id,$name,$city,$address,$tel,$mobile,$notes);   
      

     header("Location:../customersList.php");
     
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
  if (isset($_GET['del_cust']))
  {
    $_enc = new Encryption();
    $_cust = new Customers();
    $id = $_enc->decode($_GET['del_cust']); 
    
    $_cust->delete($id); 
    header("Location: ../customersList.php");     
  }
 
  

 
 /////////////////////////////////////////////////////////////////////////
 
 

 //////////////////////////////////////////////////////////////////

 

 /////////////////////////////////////////////////////////////////////////////////////////
 if (isset($_POST['update_cust']))
 {
    $_enc = new Encryption();
    $_cust = new Customers();
   
   $name     = $_POST['name'];
   $city     = $_POST['city'];
   $address  = $_POST['address'];
   $tel      = $_POST['tel'];
   $mobile   = $_POST['mobile'];
   $notes    = $_POST['notes'];
   
   
   $fileds = array(
           0 => 'custName',
           1 => 'Place',
           2 => 'Address',
           3 => 'Telephone',
           4 => 'mobile',          
           5 => 'notes'
        );
   $values = array(
           0 => $name,
           1 => $city,
           2 => $address,
           3 => $tel,
           4 => $mobile,
           5 => $notes
        );
   $counter = count($values);
   $select = 'custid';
   $id = $_GET['e'];
   $_cust->update_cust($fileds,$values,$counter,$select,$id);  
      
   header("Location: ../customersList.php");   
 }

     

?>

<? ob_flush(); ?>