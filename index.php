<?php
 require_once 'languages/common.php';
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Absolute admin</title>

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/metis-menu/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/simple-line-icons-master/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/c3/c3.min.css" rel="stylesheet">
        <link href="assets/plugins/widget/widget.css" rel="stylesheet">
        <link href="assets/plugins/calendar/fullcalendar.min.css" rel="stylesheet">
        <link href="assets/plugins/ui/jquery-ui.css" rel="stylesheet">
                 <!-- Bootstrap Material Design -->
  <link href="assets/plugins/material-design/css/bootstrap-material-design.html" rel="stylesheet">
  <link href="assets/plugins/material-design/css/ripples.min.html" rel="stylesheet">
        <!-- THEME CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme/dark.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body class="account">
        <div class="container">
            <div class="row">
                <div class="account-col text-center">
                    <h1>Projects Management Application</h1>
                    <h3><?php echo $lang['login_formHeader'] ?></h3>
                    <form class="m-t" role="form" name="login" action="functions/login.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $lang['login_inputUsername']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang['login_inputPassword']; ?>" required="">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block "><?php echo $lang['login_buttonLogin']; ?></button>
                        <a href="#"><small><?php echo $lang['login_footer_header']; ?></small></a>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
