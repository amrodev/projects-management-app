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
<title>Suppliers</title>
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
<h4>Suppliers</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->
                 

<div class="row">
   <div class="col-md-10">
   <div class="panel panel-card margin-b-30">
       <!-- Start .panel -->
       <div class="panel-heading">
        Update Supplier                                        
       </div>
       <?php 
         require_once 'lib/suppliers.php';
         require_once 'lib/Encryption.php';
         $_sup = new Suppliers();
         $_enc = new Encryption();
         if(isset($_GET['s']))
         {
           $id = $_enc->decode($_GET['s']);
           $sup = $_sup->get_supdata('supid',$id);
         }
         else {
             header("Location: index.php");
         }
       ?>
       <div class="panel-body">
           <form class="form-horizontal" method="post" id="update_sup" name="update_sup" action="functions/suppliers_functions.php?s=<?php echo $id; ?>" data-toggle="validator" novalidate="true">
           
           <div class="form-group"><label class="col-lg-2 control-label">Supplier Name</label>
               <div class="col-lg-10"><input type="text" value="<?php echo $sup[0]['supName']; ?>" name="name" class="form-control" required=""> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Address</label>
               <div class="col-lg-10"><input type="text" name="address" value="<?php echo $sup[0]['Address']; ?>" class="form-control"> 
               </div>
           </div>
           <div class="form-group"><label class="col-lg-2 control-label">Telephone</label>
               <div class="col-lg-10"><input type="text" name="tel" value="<?php echo $sup[0]['Telephone']; ?>" class="form-control" > 
               </div>
           </div>
            <div class="form-group"><label class="col-lg-2 control-label">Mobile</label>
               <div class="col-lg-10"><input type="text" name="mobile" value="<?php echo $sup[0]['mobile']; ?>" class="form-control" > 
               </div>
           </div>
           
          
           <div class="form-group"><label class="col-lg-2 control-label">Notes</label>
               <div class="col-lg-10">
               <textarea name="notes" class="form-control">
                 <?php echo $sup[0]['Notes']; ?>
               </textarea>
               </div>
           </div>
           <div class="form-group">
               <div class="col-lg-offset-2 col-lg-10">
                   <button id="update_sup" name="update_sup" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
               </div>
           </div>
           
       </form>
       </div>
   </div>
  </div>                      

<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>