<?php require_once('../../private/initialize.php'); ?>

<section class="sidebar">
  <ul>
    <?php include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; List of cds</a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/contact_details/index_update.php?id=' . u(h($id))); ?>">&laquo; Edit </a>
</div>

<div id="desc">
<h3>Update completed</h3>
<?php
$id = $_GET['id'];

global $db;
$cd = find_contact_details_by_id($id);
$count = mysqli_num_rows($cd); //counts the no of rows
echo "searched for item with id " . $id . ".";
echo " -> nr of items found by mysql query: " . $count . "";
?>

<p>Clinic with id: <?php echo $id/*h($clinic['id'])*/ ?> has the following url:
<?php echo h($cd['website_url']) ?>
.<p> 

<a class="back-link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; Back to subject info</a>
</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>