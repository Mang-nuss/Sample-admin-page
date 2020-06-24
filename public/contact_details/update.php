<?php

require_once('../../private/initialize.php');


if(is_post_request()) {

    global $db;
    
    $id = $_GET['id'];

    $subject = [];
    $subject['clinic_id'] = $id;
    $subject['contact_name'] = $_POST['contact_name'] ?? '';
    $subject['website_url'] = $_POST['website_url'] ?? '';
    $subject['facebook_url'] = $_POST['facebook_url'] ?? '';
    $subject['linkedin_url'] = $_POST['linkedin_url'] ?? '';
    $subject['insta_url'] = $_POST['insta_url'] ?? '';
    #$subject['position'] = $_POST['position'] ?? '';
    #$subject['visible'] = $_POST['visible'] ?? '';
    $result = update_contact_details($subject);

    //$result should be True
    if($result) {
        redirect_to(url_for('/contact_details/show_updatebyid.php?id=' . $id));
    }
    else { echo mysqli_error($db); }
}
?>