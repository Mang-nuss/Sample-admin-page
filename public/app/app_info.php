<?php require_once('../../private/initialize.php');
    //require_once(PRIVATE_PATH . '/initialize.php');
    //echo "inside 1st php";
    $thetitle = "NP";
    $menutitle = "NP admin site";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>  
    <?php 
    //$page_id = find_subject_id_by_name('/app/app.php');
    include_once(PRIVATE_PATH . "/navigator.php");?>
  </ul>
</section>

<?php
    $clinic_id = $_GET['clinic_id'];
    $clinic = find_clinic_by_id($clinic_id);
    $feat_id = $_GET['feat_id'];
?>

<section class="contents">
<div class="desc">
    <h2><?php echo "About your app" ?></h2>
    <p>
    After you have been authenticated (by logging in), all info about the contents
    of your specific application will be displayed.
    </p>
    <p>
        For the moment, let's say you have logged in as an admin for clinic:
        <?php echo $clinic['clinic_name'] ?> with id: 
        <?php echo $clinic['id'] ?>. The data used in your app is collected from
        a mysql table and presented in the manner below:
        </p>
</div>
<?php include_once(PRIVATE_PATH . '/content_nav.php'); /* The Menu is presented */ ?> 
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing clauses ?>
