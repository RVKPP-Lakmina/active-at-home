<?php
require_once('database_functions.php');
require_once('class_api.php');
require_once('pre_initialize.php');


$db = new Database();
$database = $db->getConnection();
//table creation and data insertion
pre_initialize($database);

return new Api($database);
