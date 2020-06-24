<?php $subjs = find_treatments_by_clinicid($clinic['id']);
while($subj = mysqli_fetch_assoc($subjs)) { ?>
    <form action="<?php echo url_for('/treatments/update.php?id=' . 
    h(u($clinic['id'])) . '&treatment_id=' .
    $subj['treatment_id']); ?>" method="post">
        <dl>
        <dt>Title</dt>
        <dd><input type="text" name="treatment_name" value=" <?php echo h($subj['treatment_name']); ?> " /></dd>
        </dl>

        <dl>
        <dt>Price</dt>
        <dd><input type="text" name="price_sek" value=" <?php echo h($subj['price_sek']); ?> " /></dd>
        </dl>

        <dl>
        <dt>Info</dt>
        <dd><input type="text" name="note" value=" <?php echo h($subj['note']); ?> " /></dd>
        </dl>

        <div id="operations">
        <input type="submit" value="Update" />
        </div>
    </form>

    <form action="<?php echo url_for('/start.php'); ?>" method="delete">
    <div id="operations">
        <input type="submit" value="Remove item" />
        </div>
    </form>
<?php } ?>