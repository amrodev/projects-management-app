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
<title>Projects</title>
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
<h4>Projects Management </h4>
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
                                     New Project                                        
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="post" id="create_project" name="create_project" action="functions/project_functions.php" data-toggle="validator" novalidate="true">
                                        
                                        <div class="form-group"><label class="col-lg-2 control-label">Project Name</label>
                                            <div class="col-lg-10"><input type="text" name="project_name" placeholder="project name" class="form-control" required=""> 
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Treasury Name</label>
                                            <div class="col-lg-10">
                                              <select name="cashid" id="cashid" class="form-control" required="">
                                                <option value="">please Select Treasury</option>
                                                <?php
                                                   require_once 'lib/treasury.php';
                                                   $_tr = new Treasury();
                                                   $trs = $_tr->getAll();
                                                   for ($i=0; $i <count($trs) ; $i++) 
                                                   { 
                                                       echo '<option value="'.$trs[$i]['cashId'].'">'.$trs[$i]['cashName'].'</option>';
                                                   }

                                                ?>
                                              </select>
                                            </div>
                                        </div>

                                         <div class="form-group"><label class="col-lg-2 control-label">City</label>
                                            <div class="col-lg-10">
                                              <select name="city" id="city" class="form-control" required="">
                                                <option value="">please Select City</option>
                                                <option value="Cairo">Cairo</option>
                                                <option value="Alexandria">Alexandria</option>
                                                <option value="Giza">Giza</option>
                                                <option value="Qalyubia">Qalyubia</option>
                                                <option value="Port Said">Port Said</option>
                                                <option value="Suez">Suez</option>
                                                <option value="Gharbia">Gharbia</option>
                                                <option value="Dakahlia">Dakahlia</option>
                                                <option value="Asyut">Asyut</option>
                                                <option value="Fayoum">Fayoum</option>
                                                <option value="Sharqia">Sharqia</option>
                                                <option value="Ismailia">Ismailia</option>
                                                <option value="Aswan">Aswan</option>
                                                <option value="Beheira">Beheira</option>
                                                <option value="Minya">Minya</option>
                                                <option value="Damietta">Damietta</option>
                                                <option value="Luxor">Luxor</option>
                                                <option value="Qena">Qena</option>
                                                <option value="Beni Suef">Beni Suef</option>
                                                <option value="Sohag">Sohag</option>
                                                <option value="Monufia">Monufia</option>
                                                <option value="Red Sea">Red Sea</option>
                                                <option value="North Sinai">North Sinai</option>
                                                <option value="Matruh">Matruh</option>
                                                <option value="Kafr el-Sheikh">Kafr el-Sheikh</option>
                                                <option value="New Valley">New Valley</option>
                                                <option value="Qena">Qena</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Address</label>
                                            <div class="col-lg-10"><input type="address" name="address" placeholder="address" class="form-control" required=""> 
                                            </div>
                                        </div>                                       
                                                                                                                     
                                        
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="create_project" name="create_project" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>


                                    </div>
                                </div>
                            </div>                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>