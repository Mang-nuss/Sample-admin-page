<?php require_once('../../../private/initialize.php');
    $thetitle = "Another title";
    $menutitle = "Albums";
    include_once(SHARED_PATH . '/lists_header.php');  //includes /html and /body clauses
?>

  <?php 
        //global $db;
        $album_set = check_music_dbs();       //from query_functions.
        $count = mysqli_num_rows($album_set); //counts the no of rows
?>

<div id="content">
  <div class="listing">
  <?php echo 'Length of the album set:' . sizeof($album_set); //checking 
        echo ', nums of rows: ' . $count; 
        /*while($subject = mysqli_fetch_assoc($album_set)) {
          echo $subject['menu_name'] . "<br \>";
        }*/
          ?> 
    <div class="actions">
    <a class="action" href=<?php echo url_for("/lists/edit/index.php")?>
    >Create New Subject to be included in the table below</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Vis</th>
        <th>Artist</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
        <caption> The best Albums </caption>

      <?php while($subject = mysqli_fetch_assoc($album_set)) { //The listing of the objects ?>
        <tr>
          <td><?php echo h($subject['ID']); ?></td>
          <td><?php echo h($subject['menu_name']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['artist']); ?></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
        </tr>
      <?php } ?>

    </table>
    </div>
</div>
<?php mysqli_free_result($album_set); ?>    //frees up this set 
<?php
include_once(SHARED_PATH . '/lists_footer.php'); //includes the /body and /html closing clauses
?>