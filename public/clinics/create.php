<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php
  global $db;

  $clinic_name = $_POST['clinic_name'] ?? '';
  $contact_name = $_POST['contact_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

  $result = create_clinic($clinic_name, $contact_name);

  if($result) {
      $id = mysqli_insert_id($db);
      //$result = 
      //$clinic = find_clinic_by_id($new_id);
      //$clinic_name = $clinic['clinic_name'];
      redirect_to(url_for('/clinics/show_create.php?id=' . $id));
  }
  else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
} else {
  echo 'fail!';
  redirect_to(url_for('/index.php'));
}

?>