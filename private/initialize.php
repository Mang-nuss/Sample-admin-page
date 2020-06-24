<?php
    // Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    //echo "initializes";
    define("PRIVATE_PATH", dirname(__FILE__)); //initialize.php is on dir 'private'.
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');
    
    // Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use same document root as webserver
    // * Can set a hardcoded value:
    // * Can dynamically find everything in URL up to "/public"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    //echo "'public end': " . $public_end; ?> <br /> <?php //checking
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    //echo "doc root is printed out: " . $doc_root;
    define("WWW_ROOT", $doc_root);
        //echo "-    " . "WWW_ROOT";
    
    require_once('db_credentials.php');
    require_once('functions.php');
    require_once('database.php');
    require_once('query_functions.php');
    //require_once('navigation.php');
    
    
    $db = db_connect(); //this connecting step is demanded by the mysqli_query method.
                        //the connection is made by syncing the host, User, Password, and Db name.
    //echo " db condition check: ";
    if (!$db) {
        die('Could not Connect My Sql:' . mysql_error()); }
      //else { 
      //  echo "Connected successfully"; }
?>
