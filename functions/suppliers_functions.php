<? 
ob_start();

?>

<?php 
  require('../lib/suppliers.php');
  require('../lib/Encryption.php');  
  ini_set('session.bug_compat_warn', 0);
  ini_set('session.bug_compat_42', 0);
  
  

  //////////////////////////////////////////////////////////////////////////////
  if (isset($_POST['create_sup']))
  {  
     $_sup = new Suppliers();
     
     $name     = $_POST['name'];
     $address  = $_POST['address'];
     $tel  = $_POST['tel'];      
     $mobile   = $_POST['mobile'];     
     $notes    = $_POST['notes'];

     $id = NULL;
     $sup_status = $_sup->save($id,$name,$address,$tel,$mobile,$notes);   
      

     header("Location:../suppliersList.php");
     
  }

  


   ////////////del/////////////////////////////////////////////////////////////////
  if (isset($_GET['del_sup']))
  {
    $_enc = new Encryption();
    $_sup = new Suppliers();
    $id = $_enc->decode($_GET['del_sup']); 
    
    $_sup->delete($id); 
    header("Location: ../suppliersList.php");     
  }
 


 /////////////////////////////////////////////////////////////////////////////////////////
 if (isset($_POST['update_sup']))
 {
    $_enc = new Encryption();
    $_sup = new Suppliers();
   
   $name     = $_POST['name'];
   $address  = $_POST['address'];
   $tel      = $_POST['tel'];
   $mobile   = $_POST['mobile'];
   $notes    = $_POST['notes'];
   
   
   $fileds = array(
           0 => 'supName',
           1 => 'Address',
           2 => 'Telephone',
           3 => 'mobile',          
           4 => 'notes'
        );
   $values = array(
           0 => $name,
           1 => $address,
           2 => $tel,
           3 => $mobile,
           4 => $notes
        );
   $counter = count($values);
   $select = 'supid';
   $id = $_GET['s'];
   $_sup->update_sup($fileds,$values,$counter,$select,$id);  
      
  header("Location: ../suppliersList.php");   
 }

     

?>

<? ob_flush(); ?>