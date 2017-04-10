<?php 

require_once 'lib/treasury.php';
require_once 'lib/emp.php';
require_once 'lib/projects.php';
require_once 'lib/suppliers.php';
require_once 'lib/items.php';

$_tr       = new Treasury();
$_emp      = new Emp();
$_projects = new Projects();
$_sup      = new Suppliers();
$_item     = new Items();

$trs         = $_tr->getAll();
$tr_dec      = $_tr->getAllDec();
$trans_type  = $_tr->getAlltransType();
$employee    = $_emp->get_all();
$projects  = $_projects->get_all();
$Suppliers   = $_sup->get_all();
$items       = $_item->get_all();
?>