<?php
error_reporting(1);
//--------Site URL Link-----------------

define('INCL_PATH', dirname(__FILE__) . "/");

include_once(INCL_PATH . 'sqlConnection.php');
include_once(INCL_PATH . 'query_functions.php');
include_once(INCL_PATH . 'pagination.php');
$Q_obj = new Query_Functions;
$pagination = new Pagination();
