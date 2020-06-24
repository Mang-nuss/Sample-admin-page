<?php $welcome = find_welcome_by_clinicid($clinic['id'])?>
<form action="<?php echo url_for('welcome/update.php?id=' . h(u($clinic['id']))); ?>" method="post">
    <dl>
    <dt>Phrase</dt>
    <dd><input style="height:100px;width:300px;" type="text" name="content" value=" <?php echo h($welcome['content']); ?> " /></dd>
    </dl>

    <div id="operations">
        <input type="submit" value="Update" />
    </div>
</form>

<form action="<?php echo url_for('/welcome/index_delete.php?id=' . h(u($clinic['id']))); ?>" method="delete">
    <div id="operations">
        <input type="submit" value="Deactivate welcome feature" />
    </div>
</form>
