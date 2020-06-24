<?php require_once('../../private/initialize.php');
    //require_once(PRIVATE_PATH . '/initialize.php');
    //echo "inside 1st php";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>  
    <?php 
    //$page_id = find_subject_id_by_name('/app/app.php');
    include_once(PRIVATE_PATH . "/navigator.php");?>
  </ul>
</section>

<?php
    //$object_id = $_GET['object_id'];
    //$clinic = find_object_by_id($object_id);
    
    if(isset($_GET['section_id'])) {
        $feat_id = $_GET['section_id'];
    }
?>

<section class="contents">
<div class="desc">
    <h2><?php echo "About your app" ?></h2>
    <p>
    After you have been authenticated (by logging in), all info about the contents
    of your specific application will be displayed.
    </p>
    <p>
        For the moment, let's say you have logged in as an admin for clinic:
        <?php echo $object['object_name'] ?> with id: 
        <?php echo $object['object_id'] ?>. The data used in your app is collected from
        a mysql table and presented in the manner below:
        </p>
</div>
<?php 
/* find feats aims at finding the feats that includes the present clinic's id
in its clinics array. If it does, this feat's div is 'active'.*/
    //$clinic = find_clinic_by_id($clinic_id);
    //echo $clinic['id'];
$feats = find_advices($object['object_id']);
$products = find_products_by_id($object['id']);
$sections = find_sections_by_id($object['id']);

while($section = mysqli_fetch_assoc($sections)) { ?>
    <div class="active">
    <?php
    if($feat['id'] == $feat_id) /* If the one from the list matches the selected one*/{ ?>
        <h3><?php echo h($section['title']) . " (feat id: " . $section['section_id'] . ")"; ?></h3>
        <a style="text-decoration:none" href=
        <?php 
        $page_id = find_object_id_by_name('/app/app.php');
        echo url_for("/index.php?id=" . $page_id)?> >
        Discard</a>

    <?php 
        if($feat_id == 1) { //Welcome
            include_once(PUBLIC_PATH . '/welcome/index_update.php');
        }  

        elseif($feat_id == 2) { //Treatments 
            include_once(PUBLIC_PATH . '/treatments/index_update.php');

        } 
        else {
            
        }
    }

    else { ?>
        <h3>
            <?php echo h($section['title']) . " (feat id: " . $section['section_id'] . ")"; ?></h3>
            <a style="text-decoration:none" href=
            <?php 
            echo url_for("/app/app_info.php?object_id=" . h(u($object['object_id'])) . 
            '&feat_id=' . h(u($feat['id'])))?> >
            Read more...</a>
    <?php
    } ?>
    </div>
    <?php 
} ?>    
 
<?php mysqli_free_result($sections); 

#-- THE INACTIVE ONES -------#
$sections = find_clinic_by_id($sections['section_id']);
while($section = mysqli_fetch_assoc($sections)) {  ?>
    <div class="inactive">
        <h3><?php echo h($section['title']); ?></h3>
            <a style="text-decoration:none" href=<?php echo url_for("/start.php")?>
    >Activate!</a>
    </div>
    <?php } ?>
<?php mysqli_free_result($sections); ?>

</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing clauses ?>
