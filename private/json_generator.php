<?php require_once("initialize.php"); ?>
<!doctype html>

<html lang="en">
  <head>
    <title> Generate JSON </title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for(PUBLIC_PATH . "/stylesheets/np_admin.css"); ?>" />
  </head>
  
  <body>
  
  <h3> <?php echo "JSON generator" ?> </h3>
<section class="contents">
    <form action="<?php echo url_for("../private/json.php"); /*WHY is
    this ../private reference needed? */?>" method="post">

      <dl>
        <dt>Clinic id</dt>
        <dd><input type="text" name="id" value="" /></dd>
      </dl>
      <!-- <div class="operations"> -->
      <a>
        <input type="submit" value="Generate JSON" />
        </a>
      <!-- </div> -->
    </form>

</section>

</body>
</html>
<?php
    db_disconnect($db);
?>