<?php require_once('../../private/initialize.php'); 
include_once(SHARED_PATH . '/lists_header.php');
$id = $_GET['id'];
?>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/clinics/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/clinics/find.php'); ?>">&laquo; List of clinics</a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/clinics/index_update.php?id=' . u(h($id))); ?>">&laquo; Edit </a>
</div>
<div id="desc">
<h3>Update completed</h3>
<?php
global $db;

$clinic = find_clinic_by_id($id);
?>

<p>Clinic with id: <?php echo $id/*h($clinic['id'])*/ ?> is now named:
<?php echo $clinic['clinic_name'] ?>
.<p>

</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>