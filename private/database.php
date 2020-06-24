<?php

  require_once('db_credentials.php');

  function db_connect() {
    //echo "- IN THE DB_CONNECT FUNCTION - ";
    //$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    /* SOLVED IT BY:

    > ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
    -> BY 'sungam45962';

    */
    
    //use new mysqli instead of mysqli_connect..? OOP/Proc
    confirm_db_connect();
    /*if (!$connection) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      die('Connect Error: ' . mysqli_connect_errno());
  }
    echo "Host information: " . mysqli_get_host_info($connection) . PHP_EOL;*/
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
    /* Protects against SQL injection */
  }

  function confirm_db_connect() {
    //echo "in Confirm_db_connect Function - ";
    if(mysqli_connect_errno()) {
      //echo "- mysqli_conneect_errno is TRUE - ";
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
    //else { echo "Success!!!"; }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }



?>

