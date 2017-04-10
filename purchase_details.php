<?php 
 ob_start();
 session_start();
if($_SESSION['user_login'])
{
    require_once 'lib/Encryption.php';
    $_enc = new Encryption();
    $id   = $_enc->decode($_GET['p']); 
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
<h4>Purchase Details</h4>
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
                                     Purchase Details  - Transaction No. : PU<?php echo $id ?>                                       
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="post" id="create_treasury" name="create_treasury" action="functions/treasury_functions.php" data-toggle="validator" novalidate="true">
                                        
                                        <div class="form-group"><label class="col-lg-2 control-label">Item</label>
                                            <div class="col-lg-3">
                                            <select name="item" class="form-control" required="">
                                              <option value="">please select item</option>
                                              <?php
                                                 require_once 'functions/trans_config.php';
                                                 for ($i=0; $i <count($items) ; $i++) { 
                                                     echo '<option value="'.$items[$i]['ItemId'].'">'.$items[$i]['ItemName'].'</option>';
                                                 }
                                              ?>
                                            </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" name="quantity" placeholder="Quantity" class="form-control" required="">
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="" id="new" name="new" class="btn btn-sm btn-primary" type="submit">+</a>
                                                
                                            </div>
                                        </div>

                                        <br>                                                                             
                                        
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="create_treasury" name="create_treasury" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>


                                    </div>
                                </div>
                            </div>                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>