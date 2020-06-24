<?php require_once('../private/initialize.php');

    $thetitle = "NP";
    $menutitle = "NP admin site - become the one you wanted to be.";
    include_once(SHARED_PATH . '/lists_header.php');  //includes /html and /body clauses
?>

<section class="leftside">
    <p> The new sidebar. </p> 
</section>

<section class="sidebar">
  <ul>
    <?php 
        include_once(PRIVATE_PATH . "/navigator.php");
    ?>
  </ul>
</section>

<section class="contents">
<div class="content">
    <h2><?php echo "Create, Read, Update, and Delete (CRUD) NP clinics" ?></h2>
    <p>
    As a clinic admin, you are able to <br>
    1. create new contents (e.g., sections for your timeline), <br>
    2. retrieve all the data that you stored in our db, <br>
    3. update the contents (e.g., the picture of a particular advice), and <br>
    4. delete contents. <br>
    You will be asked for authentication before using these services.
    </p>
</div>

<div class="actions">
    <a style="text-decoration:none" href=<?php echo url_for("/clinics/find.php")?>
    >Retrieve clinic info</a>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/timelines/find.php")?>
    >Retrieve timelines info</a>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/contact_details/find.php")?>
    >Retrieve contact details info</a>
    <br>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/clinics/index_create.php")?>
    >Create New Clinic instance</a>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/clinics/index_delete.php")?>
    >Delete Clinic instance</a>
    <br>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/timelines/index_create.php")?>
    >Create New Timeline</a>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/clinics/json.php")?>
    >Another choice</a>
    <br>
    <br>
    <a style="text-decoration:none" href=<?php echo url_for("/edit/index.php")?>
    >Create contact info</a>

</div>

<!--........ SOME SLOGANS .........

<section class="slogans">
<div id=slogan_1>
    Vi finns här för dig
</div><
<div id=slogan_2>
    SÅ ATT DU KAN VARA DEN DU ÄR!
</div>
<div id=slogan_3>
    Bada-ba-pa-pa: I'm lovin it.
</div>
<div id=slogan_4>
    Våra färger är NP-blå.
</div>
<div id=slogan_5>
    Livet har sina goda stunder
</div>
</section>
-->
</section>
<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing html clauses
?> 