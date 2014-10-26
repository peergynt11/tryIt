<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => "root",       // Database user name
	"pass" => "root#1",       // Database password
	"host" => "localhost",       // Database host
	"port" => "1104",       // Database connection port (can be left empty for default)
	"db"   => "tmp_editor",       // Database name
	"dsn"  => ""        // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
);

