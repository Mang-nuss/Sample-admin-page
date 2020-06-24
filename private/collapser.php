<ul class="section">
<?php
$sects = find_sections($page['clinic_id'], $page['timeline_id']);

while($sect = mysqli_fetch_assoc($sects)) {  ?>
    <li>
    <a style="text-decoration:none" href=
    <?php 
    echo url_for("/index.php?section_id=" . h(u($sect['section_id'])))?> >
    <?php echo "section: " . h($sect['title']); ?>
    </a>
    </li>   
    <ul class="advice">
<?php

    $advices = find_advices($sect['clinic_id'], $sect['section_id']);

    while($adv = mysqli_fetch_assoc($advices)) {  ?>
        <li>
        <?php /*echo "in find advices"; */ ?>
        <a style="text-decoration:none" href=
        <?php 
        echo url_for("/index.php?advice_id=" . h(u($adv['advice_id'])))?> >
        <?php echo "advice: " . h($adv['title']) . ", id: "; ?>
        </a>
        </li>   
    <?php } ?>
    </ul>
    <?php
}
//mysqli_free_result($contents); 
mysqli_free_result($advices); 
mysqli_free_result($feats); ?>

</ul>
