<?php

require_once('../../private/initialize.php');


if(is_post_request()) {

    global $db;
    
    $id = $_GET['id'];
    $treatment_id = $_GET['treatment_id'];
    //$id = $_POST['id'];
    //$id = $_GET['id'];
    //NOTE: if this is NOT a POST request, this code lines won't work.
    $subject = [];
    $subject['clinic_id'] = $id;
    $subject['treatment_name'] = $_POST['treatment_name'] ?? '';
    $subject['price_sek'] = $_POST['price_sek'] ?? '';
    $subject['note'] = $_POST['note'] ?? '';
    #$subject['contact_name'] = $_POST['contact_name'] ?? '';
    #$subject['position'] = $_POST['position'] ?? '';
    #$subject['visible'] = $_POST['visible'] ?? '';
    echo "inside the UPDATE.PHP";
    echo " -- id: " . $subject['id'] . ", name: " . $subject['clinic_name'];
    $result = update_treatment($subject, $treatment_id);

    //$result should be True
    if($result) {
        //Here, the $id is gathered from the index-update file
        redirect_to(url_for('/treatments/show_update.php?clinic_id=' . h(u($id))));
    }
    else { echo mysqli_error($db); }
}
?>