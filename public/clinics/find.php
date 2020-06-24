<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "We stand by Your Side.";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="sidebar">
  <ul>   
    <?php 
        include_once(PRIVATE_PATH . "/navigation.php");?>
  </ul>
</section>

<section class="contents">
<div class="paths">
<a style="text-decoration:none" class="link" href="<?php echo url_for('/index.php'); ?>">&laquo; 1st page </a>
</div>
<div class="content">
<h3>Retrieved clinic data</h3>
<p>The id and name of the present clinics are displayed, along the possibility
of viewing additional info (from the contact details), edit the clinic name, and delete
the whole item.
</p>
<?php 
        //global $db;
        $clinic_set = find_all_clinics();       //from query_functions.
        #$contact_details_set = find_contact_details_by_id()
        $count = mysqli_num_rows($clinic_set); //counts the no of rows
?>

    <table class="list">
      <tr>
        <th>CLINIC ID</th>
        <th>NAME</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

        <!-- <caption><br> LIST OF ALL CLINICS </caption> -->
      
      <?php while($subject = mysqli_fetch_assoc($clinic_set)) { //The listing of the objects ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['clinic_name']); ?></td>

          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/clinics/json.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/clinics/index_update.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/clinics/index_delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
        </tr>
      <?php } /*('/contact_details/show_findbyid.php?id=' ABOVE */ ?>

    </table>
    <?php mysqli_free_result($clinic_set); ?>

</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>