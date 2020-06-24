<?php

require_once('../../private/initialize.php');


if(is_post_request()) {

    global $db;
    
    $id = $_GET['id'];
    //$id = $_POST['id'];
    //$id = $_GET['id'];
    //NOTE: if this is NOT a POST request, this code lines won't work.
    $subject = [];
    $subject['id'] = $id;
    $subject['clinic_name'] = $_POST['clinic_name'] ?? '';
    #$subject['contact_name'] = $_POST['contact_name'] ?? '';
    #$subject['position'] = $_POST['position'] ?? '';
    #$subject['visible'] = $_POST['visible'] ?? '';
    echo "inside the UPDATE.PHP";
    echo " -- id: " . $subject['id'] . ", name: " . $subject['clinic_name'];
    $result = update_clinic($subject);

    //$result should be True
    if($result) {
        //Here, the $id is gathered from the index-update file
        redirect_to(url_for('/clinics/show_update.php?id=' . h(u($id))));
    }
    else { echo mysqli_error($db); }
}
?>