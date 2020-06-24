<?php require_once('../private/initialize.php');
    $thetitle = "Deals NP";
    $menutitle = "Deals";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>  
    <?php 
    include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<?php
    $id = $_GET['id']; //id is sent in
    $clinic = find_clinic_by_id($varda_id);?>
<p>

<section class="contents">
<div id="desc">
<h3>Deals - for you..!</h3>
<p>Here, all you need to know is shown.
    The open deals for <?php echo $clinic['clinic_name'] . " " ?> are...
</p>
<h3>The deals json:</h3>
  <ul>
  <?php
  global $db;
  #$sql = "SELECT treatment_id, JSON_OBJECTAGG('treatment', treatment_name) as obj from app_contents group by treatment_id"; 
  $sql = "SELECT * from app_contents";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  while($js = mysqli_fetch_assoc($result)) { ?>
    <li> 
      <?php 
      echo json_encode($js); 
      #echo $js['treatment_id']; ?> </li>
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