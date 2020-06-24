<?php require_once('../../private/initialize.php');
    $thetitle = "Read NP";
    $menutitle = "Read";
?>

<?php include_once(SHARED_PATH . '/lists_header.php'); ?>

<section class="contents">
<div id="desc">
<h3>Read page</h3>
<p>Here, all you need to know is shown.
</p>
<?php 
        //global $db;
        $cd_set = find_all_timelines();       //from query_functions.
        $count = mysqli_num_rows($cd_set); //counts the no of rows
?>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Nr</th>
        <th>Section</th>
        <th>Message</th>
        <th>Picture id</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
        <caption> LIST OF ALL ADVICES </caption>

      <?php while($subject = mysqli_fetch_assoc($tmln_set)) { //The listing of the objects ?>
        <tr>
          <td><?php echo h($subject['ID']); ?></td>
          <td><?php echo h($subject['clinic_id']); ?></td>
          <td><?php echo h($subject['section']); ?></td>
          <td><?php echo h($subject['message']);//echo $subject['message'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['picture_id']); ?></td>
          <td><a class="action" href="<?php echo url_for('/timelines/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/timelines/index.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/timelines/show.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
        </tr>
      <?php } ?>

    </table>
    </div>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); ?>