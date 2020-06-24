<?php

require_once('../../private/initialize.php');

if(is_get_request()) {

  // Handle form values sent by new.php
  global $db;
  $id = $_GET['id'];
  //$clinic_name = $_GET['clinic_name'] ?? '';

  $sql = "DELETE FROM contact_details ";
  $sql .= "WHERE id ='" . $id . "'";
  //$sql .= "'" . $contact_name . "'";
  $sql .= ";";
  $result = mysqli_query($db, $sql);

  if($result) {
      redirect_to(url_for('/contact_details/show_delete.php?id=' . $id));
  }
  else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
} 

else {
  echo 'fail!';
  redirect_to(url_for('/index.php'));
}

?>