<?php 
ob_start();
session_start();
if($_SESSION['user_login'])
{
    require_once 'functions/trans_config.php';
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
<title>Treasury</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
<h4>Treasury Transactions</h4>
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
                                     New Transaction                                        
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="post" id="create_trans" name="create_trans" action="functions/treasury_functions.php" data-toggle="validator" novalidate="true">
                                        
                                        <div class="form-group"><label class="col-lg-2 control-label">Treasury</label>
                                            <div class="col-lg-10">
                                            <select name="tr" class="form-control" required="">
                                            <option value="">please select treasury</option>
                                            <?php
                                              for ($i=0; $i <count($trs) ; $i++) { 
                                                  echo '<option value="'.$trs[$i]['cashId'].'">'.$trs[$i]['cashName'].'</option>';
                                              } 
                                            ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Declaration</label>
                                            <div class="col-lg-10">
                                            <select name="dec" class="form-control" required="">
                                            <option value="">please select declaration type</option>
                                            <?php
                                              for ($i=0; $i <count($tr_dec) ; $i++) { 
                                                  echo '<option value="'.$tr_dec[$i]['DeclarationId'].'">'.$tr_dec[$i]['DeclarationName'].'</option>';
                                              } 
                                            ?>
                                            </select>
                                            <a href="">Add</a>                                             
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Date</label>
                                            <div class="col-lg-10">
                                            <input type="date" name="date" placeholder="Date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Transaction Type</label>
                                            <div class="col-lg-10">
                                            <select name="tr_type" id="tr_type" class="form-control" required="">
                                              <option value="" >please select type</option>
                                              <?php
                                                for ($i=0; $i <count($trans_type) ; $i++) { 
                                                    echo '<option value="'.$trans_type[$i]['TypeTransid'].'">'.$trans_type[$i]['TypeName'].'</option>';
                                                } 
                                              ?>
                                            </select>
                                            </div>
                                        </div>

                                         <div class="form-group"><label class="col-lg-2 control-label">Value</label>
                                            <div class="col-lg-10">
                                            <input type="text" name="value" placeholder="Value" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-2 control-label">Employee</label>
                                            <div class="col-lg-10">
                                              <select name="emp" class="form-control" required="">
                                              <option value="">please select employee</option>
                                              <?php
                                                for ($i=0; $i <count($employee) ; $i++) { 
                                                    echo '<option value="'.$employee[$i]['Empid'].'">'.$employee[$i]['EmpName'].'</option>';
                                                } 
                                              ?>
                                            </select>                                            
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-2 control-label">Notes</label>
                                            <div class="col-lg-10">
                                            <textarea name="notes" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-2 control-label">Project</label>
                                            <div class="col-lg-10">
                                            <select name="proj" class="form-control" >
                                              <option value="">please select project</option>
                                              <?php
                                                for ($i=0; $i <count($projectss) ; $i++) { 
                                                    echo '<option value="'.$projectss[$i]['ProjectId'].'">'.$projectss[$i]['ProjectName'].'</option>';
                                                } 
                                              ?>
                                            </select> 
                                            </div>
                                        </div>
                                          
                                          <script>
                                            
                                              function displayVals() {
                                                  
                                              var singleValues = $( "#tr_type" ).val();
                                              if(singleValues == "1"){
                                                  document.getElementById("pr1").style.visibility = "visible";
                                              }
                                              else{
                                                document.getElementById("pr1").style.visibility = "hidden";
                                              }
                                              
                                              }
                                              
                                              $( "select" ).change( displayVals );
                                              displayVals();
                                            </script>



                                        <div class="form-group" id="pr1" style="visibility: collapse;"><label class="col-lg-2 control-label">Supplier</label>
                                            <div class="col-lg-10">
                                            
                                            
                                            <select name="sup" class="form-control" >
                                              <option value="">please select suppliers</option>
                                              <?php
                                                for ($i=0; $i <count($Suppliers) ; $i++) { 
                                                    echo '<option value="'.$Suppliers[$i]['supid'].'">'.$Suppliers[$i]['supName'].'</option>';
                                                } 
                                              ?>
                                            </select> 
                                            </div>
                                        </div>

                                         

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="create_trans"  name="create_trans" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
                                            </div>
                                        </div>

                                        
                                    </form>


                                    </div>
                                </div>
                            </div>                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>