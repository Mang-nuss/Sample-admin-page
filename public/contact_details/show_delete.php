<?php require_once('../../private/initialize.php'); 
include_once(SHARED_PATH . '/lists_header.php');

$id = $_GET['id'];
?>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; List of cds</a>
</div>
<div id="desc">
<h3>Removal completed</h3>

<p>Clinic with id: <?php echo $id/*h($clinic['id'])*/ ?> is removed.<p>

</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>