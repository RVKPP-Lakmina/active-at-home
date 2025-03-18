<?php
require_once('database_functions.php');
require_once('class_api.php');
require_once('pre_initialize.php');


$database = db_connect();

//table creation and data insertion
pre_initialize($database);

return new Api($database);
