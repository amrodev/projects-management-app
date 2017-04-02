<?php 
require_once 'lib/database.php';
$_db = new Database();

$customers = $_db->count('customers');
$emps      = $_db->count('employees');
$projects  = $_db->count('projects');
$sup       = $_db->count('suppliers');
$users     = $_db->count('users');

$n_cust     =  $customers[0][0];
$n_emps     =  $emps[0][0];
$n_projects =  $projects[0][0];
$n_sup      =  $sup[0][0];
$n_users    =  $users[0][0];
?>