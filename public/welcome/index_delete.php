<?php 

require_once('../../private/initialize.php');

global $db;
$id = $_GET['id'];
$welcome = find_welcome_by_clinicid($id)?>

<p>You really want to deactivate the Welcome feature?</p>
<form action="<?php echo url_for('/welcome/delete.php?id=' . $id); ?>" method="delete">
    <div id="operations">
        <input type="submit" value="Yep." />
    </div>
</form>