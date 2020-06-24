<?php
    
    require_once('functions.php');
    //echo "- in query_functions file - ";
    
    function find_all_timelines($options=[]) {
        
        global $db;
        $visible = $options['visible'] ?? false;
        
        $sql = "SELECT * FROM timelines ";            //the title of my sql database
        //$sql .= "WHERE menu_name = 'So' ";  
        if($visible) {
            $sql .= "and visible = true ";    //remember the ending space!
          }
        //$sql .= "ORDER BY column LIMIT 5;"; 
        $result_set = mysqli_query($db, $sql);
        if (!mysqli_query($db, $sql)) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        confirm_result_set($result_set);
        return $result_set;
    }

    function find_all_clinics($options=[]) {
        
        global $db;
        $visible = $options['visible'] ?? false;
        
        $sql = "SELECT * FROM clinics ";            //the title of my sql database
        //$sql .= "WHERE menu_name = 'So' ";  
        if($visible) {
            $sql .= "and visible = true ";    //remember the ending space!
          }
        //$sql .= "ORDER BY column LIMIT 5;"; 
        $result_set = mysqli_query($db, $sql);
        if (!$result_set) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        return $result_set;
    }

    function create_clinic($clinic_name, $contact_name, $options=[]) {
        
        global $db;
        $visible = $options['visible'] ?? false;
        
        $sql = "INSERT INTO clinics ";
        $sql .= "(clinic_name) VALUES (";
        $sql .= "'" . $clinic_name . "'";
        //$sql .= "'" . $contact_name . "'";
        $sql .= "); ";

        $result = mysqli_query($db, $sql);
        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            return $result;
        }
    }

    function update_clinic($subject, $options=[]) {

        global $db;
        $id = $subject['id'];
        $name = $subject['clinic_name'];

        $sql = "UPDATE clinics SET "; 
        $sql .= "clinic_name='" . $name . "' ";
        $sql .= "WHERE id='" . $id . "' ";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            //Traces...
            $count = mysqli_num_rows($result);
            echo " -> set size: " . $count . "";
            echo " ... for id " . h($subject['id']) . ". ";
            return true;
        }
        #else {
         #   $subject = find_clinic_by_id($id);
        #}
    }
    
    function find_object_by_id($id, $options=[]) {
        
        global $db;
        
        $visible = $options['visible'] ?? false;
        
        $sql = "SELECT * FROM objects ";            //the title of my sql database
        $sql .= "WHERE id = '" . $id . "' ";
        #db_escape($db, $id)
        if($visible) {
            $sql .= "and visible = true";    //remember the ending space!
          }
        $result_set = mysqli_query($db, $sql);

        if (!mysqli_query($db, $sql)) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        confirm_result_set($result_set);

        //gets the one subject from the regular array
        $object = mysqli_fetch_assoc($result_set);
        mysqli_free_result($result_set);
        return $object; //returns assoc array
    }

    function create_contact_details($name, $options=[]) {
        
        global $db;
        $visible = $options['visible'] ?? false;
        
        $sql = "INSERT INTO contact_details ";
        $sql .= "(contact_name) ";
        $sql .= "VALUES (";
        $sql .= "'" . $name . "'";
        //$sql .= "'" . $contact_name . "'";
        $sql .= ")";

        $result_set = mysqli_query($db, $sql);
        if (!$result_set) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        return $result_set;
    }

    function find_all_contact_details($options=[]) {
        
        global $db;
        $visible = $options['visible'] ?? false;
        
        $sql = "SELECT c.id, c.clinic_name, cd.contact_name, cd.phone_nr, 
        cd.website_url, cd.facebook_url, cd.linkedin_url, cd.insta_url FROM 
        contact_details as cd LEFT JOIN clinics as c on (c.id = cd.clinic_id)";
        #$sql = "SELECT * FROM contact_details ";
        if($visible) {
            $sql .= "and visible = true ";    //remember the ending space!
            }
        //$sql .= "ORDER BY column LIMIT 5;"; 
        $result_set = mysqli_query($db, $sql);
        if (!mysqli_query($db, $sql)) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        #$result = mysqli_fetch_assoc($result_set);
        #mysqli_free_result($result_set);
        return $result_set;
    }

    function find_contact_details_by_id($id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
 
        $sql = "SELECT * FROM contact_details";            //the title of my sql database
        $sql .= " WHERE clinic_id =  '" . $id . "' ";  
        if($visible) {
            $sql .= "and visible = true ";    //remember the ending space!
          }
        //$sql .= "ORDER BY column LIMIT 5;"; 
        $result = mysqli_query($db, $sql);
        if (!mysqli_query($db, $sql)) {
            printf("Error message: %s\n", mysqli_error($db));
        }
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject;
    }

    function update_contact_details($subject, $options=[]) {

        global $db;

        $contact = $subject['contact_name'];
        $web = $subject['website_url'];
        $fb = $subject['facebook_url'];
        $lin = $subject['linkedin_url'];
        $insta = $subject['insta_url'];
        $id = $subject['clinic_id'];
        
        $sql = "UPDATE contact_details SET ";
        #$sql .= "WHERE id=1 " ; //$id is used from the index site
        $sql .= "contact_name='" . $contact . "', ";
        $sql .= "website_url='" . $web . "', "; //NOTE: the commas!
        $sql .= "facebook_url='" . $fb . "', ";
        $sql .= "linkedin_url='" . $lin . "', ";
        $sql .= "insta_url='" . $insta . "' ";
        $sql .= "WHERE clinic_id='" . $id . "' ";
        #$sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            //Traces...
            $count = mysqli_num_rows($result);
            echo " -> set size: " . $count . "";
            echo " ... for id " . h($subject['id']) . ". ";
            return true;
        }
        #else {
         #   $subject = find_clinic_by_id($id);
        #}
    }


    function check_tmln_dbs() {

        global $db;

        //$sql = "SHOW DATABASES;";
        $q = '/timelines_retrieve.sql';
        $sql = "SELECT * FROM timelines";
        echo 'testing the sql_to_php method stated in functions.php';
        //$sql = sql_to_php(‎⁨"/timelines_retrieve.sql"); //testing the sql_to_php method stated in functions.php
        $set = mysqli_query($db, $sql);

        //echo "inside CHECK_DATABASES";
        if (!mysqli_query($db, $sql)) {
            echo " - MYSQLI_QUERY is FALSE -";
            printf("Error message: %s\n", mysqli_error($db));
        }
        //echo "______-failed!";
        confirm_result_set($set);
        return $set;
    }

    function check_tml_dbs() {

        global $db;

        //$sql = "SHOW DATABASES;";
        $sql = "SELECT * FROM timelines";
        $sql .= " WHERE length >= 121";
        $sql .= " ORDER BY length DESC;";
        $set = mysqli_query($db, $sql);

        //echo "inside CHECK_DATABASES";
        if (!mysqli_query($db, $sql)) {
            echo " - MYSQLI_QUERY is FALSE -";
            printf("Error message: %s\n", mysqli_error($db));
        }
        //echo "______-failed!";
        confirm_result_set($set);
        return $set;
    }

    /* from Globe Bank ;) */
    function find_all_subjects($options=[]) {

        global $db;
    
        $subpage = $options['subpage'] ?? false; //if not stated, it is False
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE id >= 5 "; //For the admin-page to show a limited set.
        if($subpage) {
            //echo "subpage condition!";
           $sql .= "AND subpage = false ";
        }
        //$sql .= "ORDER BY position ASC;";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
      }

    function find_subject_id_by_name($name) {

        global $db;
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE ref='" . $name . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $page = mysqli_fetch_assoc($result);
        return $page['id'];
    }

    function find_pages_by_subject_id($subject_id, $options=[]) {

        global $db;
    
        $visible = $options['visible'] ?? false;
    
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE part_id='" . db_escape($db, $subject_id) . "' ";
        if($visible) {
          $sql .= "AND visible = true ";
        }
        $sql .= "ORDER BY position ASC;";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
      }

      function find_page_by_id($id, $options=[]) {

        global $db;
    
        $subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $page = mysqli_fetch_assoc($result);
        return $page;
      }

      /* Only the contents for the Specific Feat is to be shown, and below
      this specific section. Thus, this function check whether this is the correct
      feat, and then retrieves the app contents entered by the clinic, for this 
      spec feat.
      - 1: check for correct id nr in the app_contents table
      - 2: check if the info corresponds to the correct feat (e.g. treatment).*/
      function find_treatments_by_clinicid($clinic_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM treatments ";
        $sql .= "WHERE clinic_id='" . db_escape($db, $clinic_id) . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_welcome_by_clinicid($clinic_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM welcome_contents ";
        $sql .= "WHERE clinic_id='" . db_escape($db, $clinic_id) . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $welcome = mysqli_fetch_assoc($result);
        return $welcome;
    }

    /*The update method takes a Welcome Subject as arg */
    function update_welcome($subject, $options=[]) {

        global $db;
        $clinic_id = $subject['clinic_id'];
        $content = $subject['content'];

        $sql = "UPDATE welcome_contents SET "; 
        $sql .= "content='" . $content . "' ";
        $sql .= "WHERE clinic_id='" . $clinic_id . "' ";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            //Traces...
            // $count = mysqli_num_rows($result);
            // echo " -> set size: " . $count . "";
            // echo " ... for id " . h($subject['id']) . ". ";
            return true;
        }
        #else {
         #   $subject = find_clinic_by_id($id);
        #}
    }

    function update_treatment($subject, $treatment_id, $options=[]) {

        global $db;
        $clinic_id = $subject['clinic_id'];
        $name = $subject['treatment_name'];
        $price = $subject['price_sek'];
        $note = $subject['note'];

        $sql = "UPDATE treatments SET "; 
        $sql .= "treatment_name='" . $name . "', ";
        $sql .= "price_sek='" . $price . "', ";
        $sql .= "note='" . $note . "' ";
        $sql .= "WHERE clinic_id='" . $clinic_id . "' AND ";
        $sql .= "treatment_id='" . $treatment_id . "' ";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            return true;
        }
    }

    function add_to_app_features($feat_id, $clinic_id) {
        global $db;
        $sql = "set @a := (select clinics from app_features ";
        $sql .= "WHERE id = '" . $feat_id . "'); ";
        $sql .= "set @b = (select JSON_ARRAY_APPEND(@a, '$', '" . 
        $clinic_id . "'); ";
        $sql .= "UPDATE app_features ";
        $sql .= "SET clinics = @b ";
        $sql .= "WHERE id = '" . $feat_id . "' ";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            return true;
        }
    }

    //1. removes the clinic from the array, 2. updates with new array.
    function remove_from_app_features($feat_id, $clinic_id) {
        global $db;
        $sql = "set @a := (select clinics from app_features ";
        $sql .= "WHERE id = '" . $feat_id . "'); ";
        $sql .= "set @b = (select JSON_REMOVE(@a, '$[0]'); ";
        $sql .= "UPDATE app_features ";
        $sql .= "SET clinics='@b' "; 
        $sql .= "WHERE id = '" . $feat_id . "' ";
        $result = mysqli_query($db, $sql);

        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            return true;
        }
    }

    /* This one finds out whether the different features (e.g. "treatments") are
    actively used by the clinic.
    - If the clinic have active settings for a feature, the index for this feat
    is set to '1' (true),
    - else, it is set to '0' and so there are no contents to be displayed on
    the app.php page.*/
    function find_feats($options=[]) {

        // echo "find feats";
        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM app_features ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_feat_by_id($id, $options=[]) {

        // echo "find feats";
        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM app_features ";
        $sql .= "WHERE id='" . $id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $feat = mysqli_fetch_assoc($result);
        return $feat;
    }

    // function find_active_feats($id, $options=[]) {

    //     global $db;
    //     $visible = $options['visible'] ?? false;
    //     $sql = "SELECT JSON_LENGTH(sections) from app_sections ";
    //     $sql .= "where clinic_id ='" . $id . "' ";
    //     $res = mysqli_query($db, $sql);
    //     echo $res;
    //     $sql = "SELECT JSON_EXTRACT(sections, '$.*') from app_sections ";
    //     $sql .= "where clinic_id ='" . $id . "' ";
    //     $result = mysqli_query($db, $sql);
    //     confirm_result_set($result);
    //     $array = mysqli_fetch_assoc($result);
    //     return $array;
    // }

    function find_active_feats_for_clinic($clinic_id) {
        
        //echo "feat is used?";
        //echo $feature;
        global $db;
        $sql = "SELECT * FROM app_features ";
        $sql .= "WHERE JSON_CONTAINS(clinics,'" . $clinic_id . "');";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_inactive_feats_for_clinic($clinic_id) {
        
        //echo "feat is used?";
        //echo $feature;
        global $db;
        $sql = "SELECT * FROM app_features ";
        $sql .= "WHERE JSON_CONTAINS(clinics,'" . $clinic_id . "') = FALSE;";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_timelines($clinic_id, $options=[]) {

        // echo "find feats";
        global $db;
        $visible = $options['visible'] ?? false;
        //$sql = "SELECT * FROM timelines ";
        $sql = "SELECT distinct t.timeline_title, s.title, s.timeline_id ";
        $sql .= "from timelines as t ";
        $sql .= "join sections as s ";
        $sql .= "where t.clinic_id = '" . $clinic_id . 
        $sql .= "' and s.clinic_id = '" . $clinic_id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_tmlns($object_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM timelines ";
        $sql .= "WHERE object_id = '" . $object_id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_timeline_by_id($id, $options=[]) {

        global $db;
    
        $subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM timelines ";
        $sql .= "WHERE timeline_id='" . db_escape($db, $id) . "' ";
        // $sql .= "and clinic_id='" . 
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $page = mysqli_fetch_assoc($result);
        return $page;
      }

      function find_timeline_by_section_id($section_id, $object_id, 
      $options=[]) {

        global $db;
    
        $subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM timelines ";
        $sql .= "WHERE section_id='" . db_escape($db, $section_id) . "' ";
        $sql .= "and object_id='" . $object_id . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $tmln = mysqli_fetch_assoc($result);
        return $tmln;
      }

      function collapse_timeline($timeline) {
          global $db;
        if($timeline['collapsed']) {
            $sql .= "UPDATE timelines ";
            $sql .= "SET collapsed = false ";
            $sql .= "WHERE timeline_id = '" . 
            $timeline['timeline_id'] . "' "; }
        else {
            $sql .= "UPDATE timelines ";
            $sql .= "SET collapsed = true ";
            $sql .= "WHERE timeline_id = '" . 
            $timeline['timeline_id'] . "' "; }
        $result = mysqli_query($db, $sql);
        if (!$result) {
            printf("Error message: %s\n", mysqli_error($db));
            db_disconnect($db);
            exit;
        }
        else {
            return true;
        }
    }

      function find_sections($object_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM sections ";
        $sql .= "WHERE object_id = '" . $object_id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_section_by_id($section_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM sections ";
        $sql .= "WHERE section_id='" . db_escape($db, $section_id) . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $section = mysqli_fetch_assoc($result);
        return $section;
      }

      function find_section_by_advice_id($advice_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM sections ";
        $sql .= "WHERE advice_id='" . $advice_id . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $advice = mysqli_fetch_assoc($result);
        return $advice;
      }

      function find_sections_by_timeline_id($timeline_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM sections ";
        $sql .= "WHERE timeline_id='" . $timeline_id . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
      }


      function collapse_section($section) {
        global $db;
      if($section['collapsed'] == true) {
          $sql .= "UPDATE sections ";
          $sql .= "SET collapsed = false ";
          $sql .= "WHERE section_id = '" . 
          $section['section_id'] . "' "; }
      else {
          $sql .= "UPDATE sections ";
          $sql .= "SET collapsed = true ";
          $sql .= "WHERE section_id = '" . 
          $section['section_id'] . "' "; }
      $result = mysqli_query($db, $sql);
      if (!$result) {
          printf("Error message: %s\n", mysqli_error($db));
          db_disconnect($db);
          exit;
      }
      else {
          return true;
      }
  }


    function find_advice_by_id($advice_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM advices ";
        $sql .= "WHERE advice_id='" . db_escape($db, $advice_id) . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $advice = mysqli_fetch_assoc($result);
        return $advice;
    }

    function find_advice_by_section_id($object_id, $section_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM advices ";
        $sql .= "WHERE object_id='" . db_escape($db, $object_id) . "' ";
        $sql .= "and section_id='" . db_escape($db, $section_id) . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $advice = mysqli_fetch_assoc($result);
        return $advice;
    }

    function find_advices_by_section_id($section_id, $options=[]) {

        global $db;
    
        //$subpage = $options['subpage'] ?? false;
    
        $sql = "SELECT * FROM advices ";
        $sql .= "WHERE section_id='" . db_escape($db, $section_id) . "' ";
        if($subpage) {
            $sql .= "and subpage = false ";
        }
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_advices($object_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM advices ";
        $sql .= "WHERE object_id = '" . $object_id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    // function find_advice_by_id($clinic_id, $advice_id, $options=[]) {

    //     global $db;
    //     $visible = $options['visible'] ?? false;
    //     $sql = "select distinct a.advice ";
    //     $sql .= "from advices as a ";
    //     $sql .= "join sections as s ";
    //     $sql .= "join clinics as c ";
    //     $sql .= "join timelines as t ";
    //     $sql .= "where a.advice_id = '" . $advice_id . "' ";
    //     $sql .= "and a.section_id = s.section_id ";
    //     $sql .= "and s.timeline_id = t.timeline_id ";
    //     $sql .= "and c.clinic_id = '" . $clinic_id . "' ";
    //     $sql .= "order by a.title ";
    //     $result = mysqli_query($db, $sql);
    //     confirm_result_set($result);
    //     $message = mysqli_fetch_assoc($result);
    //     return $message;
    // }

    function find_products($object_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM products ";
        $sql .= "WHERE object_id = '" . $object_id . "' ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_products_by_advice_id($advice_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "SELECT * FROM products ";
        $sql .= "WHERE advice_id='" . $advice_id . "' "; 
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_products_by_id($object_id, $product_id, $options=[]) {

        global $db;
        $visible = $options['visible'] ?? false;
        $sql = "select distinct p.product_name ";
        $sql .= "from products as p ";
        $sql .= "join advices as a ";
        $sql .= "join sections as s ";
        $sql .= "join objects as o ";
        $sql .= "join timelines as t ";
        $sql .= "where p.product_id = '" . $product_id . "' ";
        $sql .= "and p.advice_id = a.advice_id "; 
        $sql .= "and a.section_id = s.section_id ";
        $sql .= "and s.timeline_id = t.timeline_id ";
        $sql .= "and o.object_id = '" . $object_id . "' ";
        $sql .= "order by a.title ";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $product = mysqli_fetch_assoc($result);
        return $product;
    }
?>
