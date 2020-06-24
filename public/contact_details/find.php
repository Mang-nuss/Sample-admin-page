<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Bli Nöjd med oss.";
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
<h3>Contact details page</h3>
<p>Here, all you need to know is shown. The mysql query joins the clinics, contact_details,
and emps tables to view (by clicking ->view) all data associated with the clinic. You are
also able to edit the contact details shown in the table.
</p>
<?php 
        //global $db;
        $clinic_set = find_all_contact_details();       //from query_functions.
        #$contact_details_set = find_contact_details_by_id()
        $count = mysqli_num_rows($clinic_set); //counts the no of rows
        echo "nums of items by mysql query: " . $count . "";
?>

    <table class="list">
      <tr>
        <th>clinic id</th>
        <th>Name</th>
        <th>Contact guy</th>
        <th>Phone nr</th>
        <th>website_url</th>
        <th>fb_url</th>
        <th>linkedin_url</th>
        <th>insta_url</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

        <caption><br> LIST OF ALL CONTACT DETAILS </caption>
      
      <?php while($subject = mysqli_fetch_assoc($clinic_set)) { //The listing of the objects ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['clinic_name']); ?></td>
          <td><?php echo h($subject['contact_name']); ?></td>
          <td><?php echo h($subject['phone_nr']);//echo $subject['message'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['website_url']); ?></td>
          <td><?php echo h($subject['facebook_url']); ?></td>
          <td><?php echo h($subject['linkedin_url']); ?></td>
          <td><?php echo h($subject['insta_url']); ?></td>
          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/contact_details/show_findbyid.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/contact_details/index_update.php?id=' . h(u($subject['id']))) ?>">Edit</a></td>
          <td><a style="text-decoration:none" class="action" href="<?php echo url_for('/contact_details/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
        </tr>
      <?php } ?>

    </table>

</div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>