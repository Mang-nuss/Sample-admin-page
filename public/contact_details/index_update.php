<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "The Enterprise One is the Best One.";
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
<div class="content">

    <h1>Edit contact details</h1>

  <?php
    $id = $_GET['id']; //id is sent in
    $clinic = find_clinic_by_id($id);
    $cd = find_contact_details_by_id($id);
    ?>

    <form action="<?php echo url_for('/contact_details/update.php?id=' . $id); ?>" method="post">
      <dl>
        <dt>Clinic id: <?php echo $clinic['id'] ?></dt>
      </dl>
      <dl>
        <dt>Clinic name: <?php echo $clinic['clinic_name'] ?></dt>
    </dl>
    <dl>
        <dt>Contact guy</dt>
        <dd><input type="text" name="contact_name" value=" <?php echo h($cd['contact_name']) ?> " /></dd>
      </dl>
      <dl>
        <dt>Web url</dt>
        <dd><input type="text" name="website_url" value=" <?php echo h($cd['website_url']) ?> " /></dd>
      </dl>
      <dl>
        <dt>Fb url</dt>
        <dd><input type="text" name="facebook_url" value=" <?php echo h($cd['facebook_url']) ?> " /></dd>
      </dl>
      <dl>
        <dt>LinkedIn url</dt>
        <dd><input type="text" name="linkedin_url" value=" <?php echo h($cd['linkedin_url']) ?> " /></dd>
      </dl>
      <dl>
        <dt>Insta url</dt>
        <dd><input type="text" name="insta_url" value=" <?php echo h($cd['insta_url']) ?> " /></dd>
      </dl>
        
      <input type="submit" value="Update contact details" />

    </form>
    <form action="<?php echo url_for('/emps/index_create.php?id=' . $id); ?>" method="post">

        <input type="submit" value="Proceed by entering employees" />
      </div>
    </form>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>