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
<title>Project Management App</title>
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
<h4>Welcome to Project Management App</h4>
</div>                                      
</div>
</div>
</div>
</div><!-- end .page title-->

                  

<div class="row">
    <div class="col-sm-12">
        <!-- users -->
        <div class="col-md-6 col-lg-3">
            <div class="card orange white-text clearfix">
               <div class="card-content clearfix">
                  <i class="icon-user background-icon"></i>
                     <p class="card-stats-title right panel-title wdt-lable">Users</p>
                     <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $n_users; ?></h4>
                     <div class="clearfix"></div>
                </div>
             </div>
        </div>
        <!--End users -->

        <!-- cust -->
        <div class="col-md-6 col-lg-3">
            <div class="card orange white-text clearfix">
               <div class="card-content clearfix">
                  <i class="icon-user background-icon"></i>
                     <p class="card-stats-title right panel-title wdt-lable">Customers</p>
                     <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $n_cust; ?></h4>
                     <div class="clearfix"></div>
                </div>
             </div>
        </div>
        <!--End cus -->

        <!-- emps -->
        <div class="col-md-6 col-lg-3">
            <div class="card orange white-text clearfix">
               <div class="card-content clearfix">
                  <i class="icon-user background-icon"></i>
                     <p class="card-stats-title right panel-title wdt-lable">Employees</p>
                     <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $n_emps; ?></h4>
                     <div class="clearfix"></div>
                </div>
             </div>
        </div>
        <!--End emps -->

        <!-- supps -->
        <div class="col-md-6 col-lg-3">
            <div class="card orange white-text clearfix">
               <div class="card-content clearfix">
                  <i class="icon-user background-icon"></i>
                     <p class="card-stats-title right panel-title wdt-lable">Suppliers</p>
                     <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $n_sup; ?></h4>
                     <div class="clearfix"></div>
                </div>
             </div>
        </div>
        <!--End supps -->



        <div class="col-sm-3">
           <div class="card cyan white-text clearfix">
               <div class="clearfix">
                   <div class="row row-table">
                      <div class="col-xs-5 text-center bg-dark card-content-right"><i class="icon-layers background-icon"></i></div>
                          <div class="col-xs-7 text-center card-content-left">
                              <p class="card-stats-title right panel-title">Projects</p>
                              <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $n_projects; ?></h4>
                           </div>
                       </div>
                       <div class="clearfix"></div>
                    </div>
                </div>
           </div>


     </div>
                      

</div>



<?php require_once 'inc/footer.php' ?>
<? ob_flush(); ?>