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
<title>Customers</title>
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
<h4>Customers List</h4>
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
                   Customers                                       
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                       <table id="basic-datatables" class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>City</th>
                                   <th>Address</th>
                                   <th>Mobile</th>                                   
                                   <th>Actions</th>
                               </tr>
                           </thead>
                          
                           <tbody>
                           <?php
                             require_once 'lib/customers.php';
                             require_once 'lib/Encryption.php';
                             $_cust = new Customers();
                             $_enc = new Encryption();
                             $custs = $_cust->get_all();
                             for ($i=0; $i <count($custs) ; $i++) 
                             { 
                                 //ProjectId
                                 echo '<tr>';
                                 echo "<td>".$custs[$i]['custName']."</td>";
                                 echo "<td>".$custs[$i]['Place']."</td>";
                                 echo "<td>".$custs[$i]['Address']."</td>";
                                 echo "<td>".$custs[$i]['mobile']."</td>";
                                 $id = $_enc->encode($custs[$i]['custid']);
                                 echo '<td>
                                        <a href="customer_data.php?c='.$id.'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="functions/customers_functions.php?del_cust='.$id.'" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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