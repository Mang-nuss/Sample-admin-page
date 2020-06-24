<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Are you pleased?";
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
<div id="desc">
<h3>Complete clinic info</h3>
<?php

//global $db;
        
$id = $_GET['id'] ?? 'x';
$c = find_clinic_by_id($id);

$c = find_clinic_by_id($id);
$clinic = find_contact_details_by_id($id);
?>

<ul>
    <li><p>Clinic id: <?php echo h($clinic['clinic_id']) ?> <p></li>
    <li><p>name: <?php echo h($c['clinic_name']) ?><p></li>
    <li><p>Contact guy: <?php echo h($clinic['contact_name']) ?> <p></li>
    <li><p>Website: <?php echo h($clinic['website_url']) ?><p></li>
    <li><p>Facebook: <?php echo h($clinic['facebook_url']) ?> <p></li>
    <li><p>LinkedIn: <?php echo h($clinic['linkedin_url']) ?><p></li>
    <li><p>JSON:

  <?php
  global $db;
  #$sql = "SELECT treatment_id, JSON_OBJECTAGG('treatment', treatment_name) as obj from app_contents group by treatment_id"; 
  $sql = "SELECT * from app_contents ";
  $sql .= "WHERE clinic_id='" . $id . "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  while($js = mysqli_fetch_assoc($result)) { ?> 
      <?php 
      echo json_encode($js); 
      #echo $js['treatment_id']; ?> <p></li>
  <?php };
  #echo h($js[0].info);
  #echo $js[0];
  $js = json_decode($result); 
  #echo $js[0];
  ?>
  </ul>
</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>