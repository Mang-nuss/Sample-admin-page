<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Life has got its precious moments.";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>
    <?php include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
<a style="text-decoration:none" class="link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; List of cds</a>
</div>
<div id="content">

  <a style="text-decoration:none" class="back-link" href="<?php echo url_for('/contact_details/find.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create contact details</h1>

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

    <form action="<?php echo url_for('/contact_details/create.php?id=' . h(u($clinic['id']))); ?>" method="post">
      <dl>
        <dt>Clinic id: <?php echo $id ?></dt>
      </dl>
      <dl>
        <dt>Clinic name: <?php echo $clinic['clinic_name'] ?></dt>
    </dl>
    <dl>
        <dt>Contact guy</dt>
        <dd><input type="text" name="contact_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Web url</dt>
        <dd><input type="text" name="website_url" value="" /></dd>
      </dl>
      <dl>
        <dt>Fb url</dt>
        <dd><input type="text" name="facebook_url" value="" /></dd>
      </dl>
      <dl>
        <dt>LinkedIn url</dt>
        <dd><input type="text" name="linkedin_url" value="" /></dd>
      </dl>
      <dl>
        <dt>Insta url</dt>
        <dd><input type="text" name="insta_url" value="" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Set contact details and exit" />
      </div>
    </form>

    <form action="<?php echo url_for('/emps/index_create.php?id=' . h(u($clinic['id']))); ?>" method="post"> 
    <div id="operations">
        <input type="submit" value="Proceed by entering employees" />
      </div>
    </form>

  </div>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>