<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

    global $db;
    
    $clinic_id = $_GET['id'];
    $subject = [];
    $subject['clinic_id'] = $clinic_id;
    $subject['content'] = $_POST['content'] ?? '';
    
    $result = update_welcome($subject);
    if($result) {
        redirect_to(url_for('/welcome/show_update.php?clinic_id=' . h(u($clinic_id))));
    }
    else { echo mysqli_error($db); }
}
?>