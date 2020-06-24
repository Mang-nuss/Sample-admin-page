<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Bada-pa-pa-pa. I'm lovin it.";
?>

<?php include_once(SHARED_PATH . '/lists_header.php'); ?>

<section class="contents">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; List of cds</a>

<div id="content">

  <div class="subject new">
    <h1>Create employee</h1>

  <?php
    $id = $_GET['id']; //id is sent in
    echo "handled id is: " . $id . " ---";
    //clinic is found by searching on that id
    $clinic = find_clinic_by_id($id);
    $cd = find_contact_details_by_id($id);

    $count = mysqli_num_rows($cd); //counts the no of rows
    echo "searched for item with id " . $id . ".";
    echo " -> nr of items found by mysql query: " . $count . "";
    echo " name: " . $cd['contact_name'] . "";
    ?>

    <form action="<?php echo url_for('/emps/create.php?id=' . h(u($clinic['id']))); ?>" method="post">
      <dl>
        <dt>Clinic id: <?php echo $id ?></dt>
      </dl>
      <dl>
        <dt>Clinic name: <?php echo $clinic['clinic_name'] ?></dt>
    </dl>
    <dl>
        <dt>Employee's name</dt>
        <dd><input type="text" name="emp_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Phone nr</dt>
        <dd><input type="text" name="phone_nr" value="" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="mail" value="" /></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Set emp and exit" />
      </div>
    </form>

  </div>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>