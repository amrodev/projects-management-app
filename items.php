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
<title>Items</title>
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
<h4>Projects Items </h4>
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
                                     New Item                                        
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="post" id="create_item" name="create_item" action="functions/item_functions.php" data-toggle="validator" novalidate="true">
                                        
                                        <div class="form-group"><label class="col-lg-2 control-label">Item Name</label>
                                            <div class="col-lg-10"><input type="text" name="item_name" placeholder="Item Name" class="form-control" required=""> 
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-lg-2 control-label">Price</label>
                                            <div class="col-lg-10"><input type="text" name="price" placeholder="Item Price" class="form-control" required=""> 
                                            </div>
                                        </div>

                                         <div class="form-group"><label class="col-lg-2 control-label">Deprecated Ratio</label>
                                            <div class="col-lg-10"><input type="text" name="ratio" placeholder="Item Deprecated Ratio" class="form-control" required=""> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button id="create_item" name="create_item" class="btn btn-sm btn-primary disabled" type="submit">Save</button>
                                            </div>
                                        </div>

                                        
                                    </form>


                                    </div>
                                </div>
                            </div>                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>