<?php require_once('../../private/initialize.php'); 
include_once(SHARED_PATH . '/lists_header.php');?>

<section class="sidebar">
  <ul>
    <?php include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/clinics/find.php'); ?>">&laquo; List of clinics</a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/clinics/index_create.php?id=' . u(h($id))); ?>">&laquo; Create </a>
</div>
<div id="desc">
<h3>Insertion completed</h3>
<?php
    $id = $_GET['id'] ?? 'x';
    //$name = $_GET['clinic_name'];
    //echo "name: " . $name . "";

global $db;
$c = find_clinic_by_id($id);
?>

<p>Clinic with id: <?php echo $id ?> and name:
<?php echo h($c['clinic_name']) ?> was created.<p>
</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>