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
<title>Purchases</title>
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
<h4>Purchases</h4>
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
                   Purchases                                       
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                       <table id="basic-datatables" class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Treasury</th>
                                   <th>Declaration</th>
                                   <th>Date</th>                                   
                                   <th>Transaction Type</th>
                                   <th>Project</th>
                                   <th>Value</th>
                                   <th>Employee</th>
                                    <th>Actions</th>
                               </tr>
                           </thead>
                          
                           <tbody>
                           <?php
                             require_once 'lib/database.php';
                             require_once 'lib/Encryption.php';
                             $_db = new Database();
                             $selects = 'treasurertr.TrId,treasury.cashName,declarationtrans.DeclarationName ,treasurertr.DateTr,projects.ProjectName,
                                         treasurertr.CrDr,treasurertr.Value,employees.EmpName,typetrans.TypeName';
                             $OnStatement1   = 'treasury.cashId = treasurertr.CashId';
                             $OnStatement2   = 'declarationtrans.DeclarationId = treasurertr.DeclarationId';
                             $OnStatement3   = 'projects.ProjectId = treasurertr.ProjectId';
                             $OnStatement4   = 'employees.Empid = treasurertr.EmpId';
                             $OnStatement5   = 'typetrans.TypeTransid = treasurertr.TypeTransid';
                             $WhereStatement =  'treasurertr.TypeTransid =2';    
                             $purchases      = $_db->InnerJoin5('treasurertr','treasury','declarationtrans','projects','employees','typetrans',$selects,$OnStatement1,$OnStatement2,$OnStatement3,$OnStatement4,$OnStatement5,$WhereStatement);

                             $_enc = new Encryption();
                             for ($i=0; $i <count($purchases) ; $i++) 
                             { 
                                 //ProjectId
                                 echo '<tr>';
                                 echo "<td>".$purchases[$i]['cashName']."</td>";
                                 echo "<td>".$purchases[$i]['DeclarationName']."</td>";
                                 echo "<td>".$purchases[$i]['DateTr']."</td>";
                                 echo "<td>".$purchases[$i]['TypeName']."</td>";
                                 echo "<td>".$purchases[$i]['ProjectName']."</td>";
                                 echo "<td>".$purchases[$i]['Value']."</td>";
                                 echo "<td>".$purchases[$i]['EmpName']."</td>";
                                 $id = $_enc->encode($purchases[$i]['TrId']);
                                 echo '<td>
                                        <a href="purchase_details.php?p='.$id.'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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