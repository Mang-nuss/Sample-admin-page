<?php 
    require_once('../private/initialize.php');    
    $thetitle = "NP";
    $menutitle = "NP admin site";
    include_once(SHARED_PATH . '/lists_header.php');
?>
<?php
// $id = $_GET['timeline_id'];
// $timeline = find_tmln_by_id($id);
// collapse_timeline($timeline);
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
    include_once(PRIVATE_PATH . "/navigator.php");?>
  </ul>
</section>

<section class="contents">
<div class="desc">
    <h2><?php echo "About your app" ?></h2>
    <p>
    After you have been authenticated (by logging in), all info about the contents
    of your specific application will be displayed.
    </p>
    <?php
    $object = find_object_by_id($varda_id); /*The id of Varda */ ?>
    <p>
        You are now by default logged in as an admin for object:
        <?php echo $object['object_name'] ?> with id: 
        <?php echo $object['id'] ?>. The data used in your app is collected from
        a mysql table and presented in the manner below:
        </p>
</div>

<!-- /* find feats aims at finding the feats that includes the present clinic's id
in its clinics array. If it does, this feat's div is 'active'.

IF readmore is chosen, the info is to be collapsed (shown).
    The user is thus directed to another page with identical content plus
    the additional info.
*/ -->

<?php 
  $timeline_id = 2;
  include_once(PRIVATE_PATH . '/content_nav.php'); /* The Menu is presented */ 
?> 
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing clauses ?>