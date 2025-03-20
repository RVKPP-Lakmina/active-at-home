<?php
require_once('credentials.php'); // Ensure credentials are available

function db_connect()
{
    try {
        $database = new mysqli(DB_SERVER, DB_USER, DB_PASS);
    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }

    if ($database->connect_errno) {
        die("Connection failed: " . $database->connect_error);
    }

    // Create database if it doesn't exist
    $db_name = DB_NAME;
    $database->query("CREATE DATABASE IF NOT EXISTS $db_name");

    // Now connect to the newly created database
    $database->select_db($db_name);

    return $database;
}
