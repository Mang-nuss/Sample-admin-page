<?php require_once('../../../private/initialize.php'); //should reuqire a spec path for each file (according to directory)?
    //NB the 1 more ../ above! It is because the root (from where the search for the .php is launched) is one more step down
    //compared to the 'lists' directory.
     $thetitle = "Another title";
    $menutitle = "motion pictures";
?>

<?php include SHARED_PATH . '/lists_header.php'; ?>

<?php //$movie_set = find_all(); ?>

<?php 
        //global $db;
        $movie_set = check_movie_dbs();       //from query_functions.
        $count = mysqli_num_rows($movie_set); //counts the no of rows
?>

<div id="content">
  <div class="listing">
  <?php echo 'Length of the album set:' . sizeof($movie_set); //checking 
        echo ', nums of rows: ' . $count; 
        /*while($subject = mysqli_fetch_assoc($album_set)) {
          echo $subject['menu_name'] . "<br \>";
        }*/
          ?> 

<head>
  <title>Staff Pages</title>
  <meta charset="utf-8">
  <img></img>
</head>

<div id="content">
  <div class="subjects listing">
  <h1>Items</h1>

  <a class="action" href=<?php echo url_for("/lists/edit/index.php")?>
  >Create New Subject to be included in the table below</a>
  </div>


<body>
<table class="list">
  <tr>
    <th>ID</th>
    <th>Director</th>
    <th>Length</th>
    <th>Genre</th>
    <th>Starring<th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
    <caption> The best motion pictures </caption>
  <?php /*$subjects = [['id'=>'1', 'position'=>'x', 'visible'=>'1', 'menu_name'=>'vertigo'],
          ['id'=>'2', 'position'=>'y', 'visible'=>'1', 'menu_name'=>'awakenings'] ];*/
              
        while($subject = mysqli_fetch_assoc($movie_set)) { //The listing of the objects ?>
        <tr>
          <td><?php echo h($subject['name']); ?></td>
          <td><?php echo h($subject['director']); ?></td>
          <td><?php echo h($subject['length']); ?></td>
          <td><?php echo h($subject['genre']); ?></td>
          <td><?php echo h($subject['starring']); ?></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/lists/music/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
        </tr>
        <?php } 
        /*foreach($subjects as $subject) { ?>
    <tr>
      <td><?php echo $subject['id']; ?></td>
      <td><?php echo $subject['position']; ?></td>
      <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
        <td><?php echo $subject['menu_name']; ?></td>
      <td><a class="action" href="<?php echo url_for('/lists/movies/show.php?id=' . $subject['id']); ?>">View</a></td>
      <td><a class="action" href="">Edit</a></td>
      <td><a class="action" href="">Delete</a></td>
      </tr>
  <?php }*/ ?>
</table>
</body>
</div>
<?php 
  $mysqli_free_result($movie_set);     //frees up this set
  //include SHARED_PATH . '/lists_footer.php' ; 
  include_once(SHARED_PATH . '/lists_footer.php');
?>