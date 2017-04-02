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
<title>Employees</title>
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
<h4>Employees List</h4>
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
                   Employees                                       
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                       <table id="basic-datatables" class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Address</th>
                                   <th>Mobile</th>
                                   <th>Title</th>
                                   <th>Daily Salary</th>
                                   <th>Actions</th>
                               </tr>
                           </thead>
                          
                           <tbody>
                           <?php
                             require_once 'lib/emp.php';
                             require_once 'lib/Encryption.php';
                             $_emp = new Emp();
                             $_enc = new Encryption();
                             $emps = $_emp->get_all();
                             for ($i=0; $i <count($emps) ; $i++) 
                             { 
                                 //ProjectId
                                 echo '<tr>';
                                 echo "<td>".$emps[$i]['EmpName']."</td>";
                                 echo "<td>".$emps[$i]['Address']."</td>";
                                 echo "<td>".$emps[$i]['mobile']."</td>";
                                 echo "<td>".$emps[$i]['Titleid']."</td>";
                                 echo "<td>".$emps[$i]['Daliy_price']."</td>";
                                 $id = $_enc->encode($emps[$i]['Empid']);
                                 echo '<td>
                                        <a href="emp_data.php?e='.$id.'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="functions/emp_functions.php?del_emp='.$id.'" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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