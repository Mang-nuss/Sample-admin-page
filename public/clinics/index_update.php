<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "NP - My precious.";
    include_once(SHARED_PATH . '/lists_header.php'); ?>
  
  <section class="sidebar">
  <ul>
    <?php include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
</div>
<div id="content">
  <div class="subject new">
    <h1>Edit clinic</h1>

  <?php
    $id = $_GET['id']; //id is sent in
    $clinic = find_clinic_by_id($id);
    // echo "handled id is: " . $id . " ---";
    // $count = mysqli_num_rows($clinic); 
    // echo "searched for item with id " . $clinic['id'] . ".";
    // echo " -> nr of items found by mysql query: " . $count . "";
?>

    <form action="<?php echo url_for('/clinics/update.php?id=' . h(u($clinic['id']))); ?>" method="post">
      <dl>
        <dt>Clinic id: <?php echo $clinic['id'] ?> </dt>
      </dl>
      <dl>
        <dt>Clinic name</dt>
        <dd><input type="text" name="clinic_name" value=" <?php echo h($clinic['clinic_name']) ?> " /></dd>
      </dl>

      <div class="operations">
        <input type="submit" value="Update name" />
      </div>
    </form>
    <form action="<?php echo url_for('/contact_details/index_update.php?id=' . h(u($clinic['id']))); ?>" method="post">
    <div class="operations">
        <input type="submit" value="Update contact details" />
      </div>
    </form>
  </div>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>