<?php require_once('../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Varda - For Your Eyes Only.";
    include_once(SHARED_PATH . '/lists_header.php'); ?>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
</div>
<div id="content">

  <div class="subject new">
    <h1>Create clinic</h1>

    <form action="<?php echo url_for('/clinics/create.php'); ?>" method="post">
      <dl>
        <dt>Clinic name</dt>
        <dd><input type="text" name="clinic_name" value="" /></dd>
      </dl>

      <dl>
        <dt>ID</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create this clinic" />
      </div>
    </form>

  </div>

</div>
</section>

<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>