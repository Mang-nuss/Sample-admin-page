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

<?php
$id = $_GET['id'];
$clinic = find_clinic_by_id($id);
?>

<section class="contents">
<div class="content">
    <h2>Deletion confirmed.</h2>
    <p>
    The welcome phrase for clinic <?php echo $clinic['clinic_name'] ?> with
    id <?php echo $id ?> was removed and the feature is deactivated.
</div>

</section>
<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing html clauses
?> 