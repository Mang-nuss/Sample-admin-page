<?php 
    require_once('../private/initialize.php');
    $thetitle = "NP";
    $menutitle = "NP admin site";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="login">
<p> Are you logged in? </p>
<form action="<?php echo url_for("../private/json.php"); /*WHY is
    this ../private reference needed? */?>" method="post">

      <a>
        <input type="submit" value="Login" />
      </a>
    </form>
</section>

<section class="sidebar">
  <ul>  
    <?php 
    $id = $_GET['section_id'];
    //$page_id = find_subject_id_by_name('/app/app.php');
    include_once(PRIVATE_PATH . "/navigator.php");?>
  </ul>
</section>


<section class="contents">
    <p> Section: <?php $section = find_section_by_id($varda_id, $id); echo $section['title']; ?> </p>
    <div class="desc">
        <h2><?php echo "About your app" ?></h2>
        <p>
        After you have been authenticated (by logging in), all info about the contents
        of your specific application will be displayed.
        </p>
        <?php
        $object = find_object_by_id($varda_id); /*The id of Varda */ ?>
        <p>
            You are now by default logged in as an admin for clinic:
            <?php echo $clinic['object_name'] ?> with id: 
            <?php echo $clinic['id'] ?>. 
            The timeline id is: <?php echo $section['timeline_id']; ?>. The data used in your app is collected from
            a mysql table and presented in the manner below:
            </p>
    </div>
    
    <!-- JSON GENERATOR FORM -->
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

<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing clauses ?>