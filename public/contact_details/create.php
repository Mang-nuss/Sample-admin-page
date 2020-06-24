<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php
  global $db;

  $clinic_name = $_POST['clinic_name'] ?? '';
  $contact_name = $_POST['contact_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

    $result = create_contact_details($contact_name);

    if($result) {

        //$clinic = find_clinic_by_id($new_id);
        //$clinic_name = $clinic['clinic_name'];
        $id = mysqli_insert_id($db);
        redirect_to(url_for('/contact_details/show_create.php?id=' . $id));
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