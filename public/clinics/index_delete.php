<?php require_once('../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Read";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>
    <?php include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<?php
$id = $_GET['id'];
$subject = find_clinic_by_id($id);
?>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
</div>
<div id="content">

  <div class="subject new">
    <h1>Delete clinic</h1>

    <form action="<?php echo url_for('/clinics/delete.php?id=' . h(u($clinic['id']))); ?>" method="delete">
      <dl>
        <dt>Clinic name</dt>
        <dd><input type="text" name="menu_name" value=" <?php echo $subject['clinic_name']; ?> " /></dd>
      </dl>

      <dl>
        <dt>ID</dt>
        <dd><input type="text" name="id" value=" <?php echo $id ?> " /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Delete this clinic" />
      </div>
    </form>

  </div>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>