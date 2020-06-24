<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php

  $clinic_name = $_POST['menu_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

  echo "Form parameters<br />";
  $sql = "INSERT INTO clinics ";
  $sql .= "(clinic_name) ";
  $sql .= "values (";
  $sql .= "'" . $clinic_name . "'";
  //$sql .= "'" . $contact_name . "'";
  $sql .= ");";
  $result = mysqli_query($db, $sql);

  if($result) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/edit/show.php?id=' . $new_id));
  }
  else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
} else {
  redirect_to(url_for('/find/index.php'));
}

?>