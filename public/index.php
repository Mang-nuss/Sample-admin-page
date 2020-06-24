<?php require_once('../private/initialize.php');
    //if an id value is put in, the page variable is
    //assigned the id from the database.
    $varda_id = 2;
    if(isset($_GET['timeline_id'])) {
        $page_id = $_GET['timeline_id'];
        // echo "timeline isset get, timeline id: " . $page_id;
        $tmln_collapsed = true;

        // $advice_selected = false;
        // $section_selected = false;
        $timeline_selected = true;
        $page = find_timeline_by_id($page_id);
        /*If subpage => true, the function (by definition) returns
        a page that is or is not a subpage (depending on condition)*/
        if(!$page) {
            redirect_to(url_for('/start.php'));
        }
        else { //echo "Page not set. :(";
        }
    }

    else if(isset($_GET['section_id'])) {
        // echo "section isset get, ";
        $page_id = $_GET['section_id'];
        $tmln_collapsed = true;
        $section_collapsed = true;

        // $advice_selected = false;
        $section_selected = true;
        // $timeline_selected = false;
        $page = find_section_by_id($varda_id, $page_id);
        /*If subpage => true, the function (by definition) returns
        a page that is or is not a subpage (depending on condition)*/
        if(!$page) {
            redirect_to(url_for('/start.php'));
        }
        else { //echo "Page not set. :(";
        }
    }

    else if(isset($_GET['advice_id'])) {
        // echo "advice is set, ";
        $page_id = $_GET['advice_id'];
        // echo $page_id . ", ";
        $tmln_collapsed = true;
        $section_collapsed = true;
        $advice_collapsed = true;

        $advice_selected = true;
        // $section_selected = false;
        // $timeline_selected = false;
        $page = find_advice_by_id($varda_id, $page_id);
        /*If subpage => true, the function (by definition) returns
        a page that is or is not a subpage (depending on condition)*/
        if(!$page) {
            redirect_to(url_for('/start.php'));
        }
        else { //echo "Page not set. :(";
        }
    }
    else {
        echo "GET is NOT SET";
    }

    //NEXT PROCEDURE:

    if(isset($page)) {
    //the content of the page corresponding to the input id is shown.
        //echo PUBLIC_PATH . $page['ref'] . $page_id . " --- ";
        // echo "page set, " . $page['ref'];
        $path = $page['ref'] . u($page_id);
        //echo PUBLIC_PATH . '/app/app.php';
        //include(PUBLIC_PATH . '/app/app.php');
        //include(PUBLIC_PATH . $path);
        //include(PUBLIC_PATH . '/app/sections.php?id=' . '2');
        include(PUBLIC_PATH . $page['ref']);
        //include("/app/app.php");
        //$allowed_tasks = '<div>';
        //echo strip_tags($part, $allowed_tags); // the method h() can be used to make html special chars visible.

    }
    else {
        //Let's say this is the login page.
        //This is shown in case the page variable is not set.
        include(PUBLIC_PATH . '/start.php');
    }


?>

