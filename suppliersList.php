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
<h4>Suppliers List</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

                  

                    
          <div class="row">
              <div class="col-md-12">
            <div class="panel panel-card recent-activites">
                      <!-- Start .panel -->
               <div class="panel-heading">
                   Suppliers                                       
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                       <table id="basic-datatables" class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Address</th>
                                   <th>Mobile</th>                                   
                                   <th>Actions</th>
                               </tr>
                           </thead>
                          
                           <tbody>
                           <?php
                             require_once 'lib/suppliers.php';
                             require_once 'lib/Encryption.php';
                             $_sup = new Suppliers();
                             $_enc = new Encryption();
                             $supliers = $_sup->get_all();
                             for ($i=0; $i <count($supliers) ; $i++) 
                             { 
                                 //ProjectId
                                 echo '<tr>';
                                 echo "<td>".$supliers[$i]['supName']."</td>";
                                 echo "<td>".$supliers[$i]['Address']."</td>";
                                 echo "<td>".$supliers[$i]['mobile']."</td>";
                                 $id = $_enc->encode($supliers[$i]['supid']);
                                 echo '<td>
                                        <a href="supplier_data.php?s='.$id.'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="functions/suppliers_functions.php?del_sup='.$id.'" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                       </td>';
                                
                                 echo '</tr>';
                             }
                           ?>                                                      
                              
                           </tbody>
                            
                       </table>
                   </div>
         </div>
                  </div><!-- End .panel --> 
        </div>
    </div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>