<?php

    //echo " - in functions file - ";
    
    function url_for($script_path) {                //check this function out on e.g. staff_header
      // add the leading '/' if not present
      if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
      }
      return WWW_ROOT . $script_path;
    }
    
    function u($string="") {
      return urlencode($string);
    }

    function raw_u($string="") {
      return rawurlencode($string);
    }

    function h($string="") {
      return htmlspecialchars($string);
    }

    function error_404() {
      header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
      exit();
    }

    function error_500() {
      header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
      exit();
    }

    function redirect_to($location) {
      header("Location: " . $location);
      exit;
    }

    function sql_to_php($file) {
      #first, the db connection is done, then:
      echo '   -    inside sql_to_php!!!';
      $query = file_get_contents(url_for($file));
      $stmt = $db->prepare($query);
      echo ' - PREPARE done  ';
      if ($stmt->execute())
        echo "Success";
      else 
        echo "Fail";
      return $query;
    }

    function require_login() {
      echo 'requires login';
      return;
    }

    function is_post_request() {
      echo "is post request";
      return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function is_get_request() {
      echo "is get request";
      return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    function is_delete_request() {
      echo "is delete request";
      return $_SERVER['REQUEST_METHOD'] == 'DELETE';
    }

?>
