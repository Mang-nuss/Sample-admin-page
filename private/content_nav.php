
<?php 
/* find feats aims at finding the feats that includes the present clinic's id
in its clinics array. If it does, this feat's div is 'active'.*/
    //$clinic = find_clinic_by_id($clinic_id);
    //echo $clinic['id'];
$feats = find_advices($varda_id, $timeline_id);
$feat_id = 2;

while($feat = mysqli_fetch_assoc($feats)) { ?>
    <div class="active">
    <?php
    if($feat['advice_id'] == $feat_id) /* If the one from the list matches the selected one*/{ ?>
        <h3><?php echo h($feat['title']) . " (feat id: " . 
        $feat['advice_id'] . ")"; ?></h3>
        <a style="text-decoration:none" href=
        <?php 
        echo url_for("/index.php?section_id=" . $feat['section_id'])?> >
        Back</a>
        <a style="text-decoration:none" href=
        <?php echo url_for('/app/app_edit.php?object_id=' . $object['object_id'] . 
        "&feat_id=" . $feat['advice_id']); /*echo url_for($feat['edit_ref'] . $clinic['id'] . 
        "&feat_id=" . $feat['id'])*/ ?> >
        Edit</a>
    <?php 
        if($feat_id == 1) { //Welcome ?>
             
            <?php 
            /*If edit mode, present the data in editable form...*/
            if($edit == true) {
                include_once(PUBLIC_PATH . $feat['ref'] . $object['id']);
            }
            else {?>
                <p> <?php echo "Phrase: " . h($welcome['title']); ?></p>     
            <?php } 
        }  

        elseif($feat_id == 2) { //Treatments ?>
            <ul>
            <?php
            while($treatment = mysqli_fetch_assoc($treatments)) { ?>      
                <li> 
                <?php
                $id = $feat['id'];
                echo h($treatment['treatment_name'] . ", treatment id: " . 
                $treatment['treatment_id']); ?>
                <p> Price: <?php echo $treatment['price_sek']; ?> </p>
                <p> Note: <?php echo $treatment['note']; ?> </p>
                </li>
            <?php 
            }
            ?>
        </ul>
        <?php
        } 
        else {
            
        }
    }

    else { ?>
        <h3>
            <?php echo h($feat['title']) . " (feat id: " . 
            $feat['advice_id'] . ")"; ?></h3>
            <a style="text-decoration:none" href=
            <?php 
            echo url_for("/index.php?advice_id='" . h(u($feat['advice_id'])))?> >
            Read more...</a>
    <?php
    } ?>
    </div>
    <?php 
} ?>    
 
<?php mysqli_free_result($feats); 

#-- THE INACTIVE ONES -------#
$feats = find_advices($object['object_id'],$timeline['timeline_id']);
while($feat = mysqli_fetch_assoc($feats)) {  ?>
    <div class="inactive">
        <h3><?php echo h($feat['title']); ?></h3>
            <a style="text-decoration:none" href=<?php echo url_for("/start.php")?>
    >Activate!</a>
    </div>
    <?php } ?>
<?php mysqli_free_result($feats); ?>