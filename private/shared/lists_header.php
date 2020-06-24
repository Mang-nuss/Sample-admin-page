
<!doctype html>

<html lang="en">
  <head>
    <title>Site: <?php echo "Sample adminpage"; //The browsing "id"?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/np_admin.css'); ?>" />
    <link rel="shortcut icon" href="">
    <?php 
      //$str = file_get_contents(PUBLIC_PATH . '/stylesheets/np_admin.css'); 
      //echo "href= . $str . "; 
      //Viva Stackoverflow: file_get_contents does the work
      //"/globe_bank/public/stylesheets/staff.css"
      //?php include(SHARED_PATH . '/staff_footer.php')
    ?>

  </head>
  
  <body>

  <img src= <?php echo url_for("/images/DSC_0168.jpg"); ?> >
  <header>
  <h1><?php $menutitle = "A sample adminpage."; echo $menutitle; ?></h1>

</header>

<section class="leftside">
    <p> The new sidebar. </p> 
</section>
