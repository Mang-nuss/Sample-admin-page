<?php

require_once('../../private/initialize.php');

if(is_get_request()) {
  global $db;
  $id = $_GET['id'];

  echo "Form parameters<br />";
  $sql = "DELETE FROM welcome_contents ";
  $sql .= "WHERE clinic_id='" . $id . "' ";
  $result = mysqli_query($db, $sql);

  if($result) { 
      /*The data in app_features have to be changed
      - This query loops over the items in the clinics column
      and removes the $id.*/
    $result = remove_from_app_features(1, $id);
    if($result) {
      redirect_to(url_for('/welcome/show_delete.php?id=' . $id));
    }
  }
  else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
} 

?>