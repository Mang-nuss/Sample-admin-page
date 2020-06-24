<?php require_once('initialize.php');
    global $db;
    $id = $_GET['id'];
    // $sql = "SELECT m.message, a.title, c.clinic_name, ";
    // $sql .= "s.timeline_id, t.timeline_title ";
    // $sql .= "from messages as m ";
    // $sql .= "join advices as a ";
    // $sql .= "join sections as s ";
    // $sql .= "join clinics as c ";
    // $sql .= "join timelines as t ";
    // $sql .= "where m.message_id = 2 ";
    // $sql .= "and m.advice_id = a.advice_id ";
    // $sql .= "and a.section_id = s.section_id ";
    // $sql .= "and s.timeline_id = t.timeline_id ";
    // //$sql .= "and t.clinic_id = '" . $id . "' ";
    // $sql .= "and c.clinic_id = '" . $id . "' ";
    // //$sql .= "and c.clinic_id = t.clinic_id ";
    // $sql .= "order by a.title;";

    //temporary
    $sql = "SELECT * from sections ";
    $sql .= "where clinic_id = 2";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    while($js = mysqli_fetch_assoc($result)) { 
        echo json_encode($js); 
        //echo $js['treatment_id']; 
        //echo h($js[0].info);
        //echo $js[0];
    };
    mysqli_free_result($result);
?>