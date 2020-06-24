<?php require_once('../../private/initialize.php');

    $thetitle = "NP";
    $menutitle = "NP admin site - become the one you wanted to be.";
    include_once(SHARED_PATH . '/lists_header.php');  //includes /html and /body clauses
?>

<section class="sidebar">
  <ul>
    <?php 
        include_once(PRIVATE_PATH . "/navigation.php");
    ?>
  </ul>
</section>

<section class="contents">
<div class="content">
    <h2>Update confirmed.</h2>
    <?php 
    $id = $_GET['clinic_id'];
    $clinic = find_clinic_by_id($id);
    $result = find_welcome_by_clinicid($id);
    ?>
    <p>
    The welcome phrase for clinic <?php echo $clinic['clinic_name'] ?> with
    id <?php echo $id ?> is now:
    <?php echo $result['content'] ?>
    </p>
</div>

</section>
<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing html clauses
?> 