<?php $pages = find_all_pages(['subpage' => false]); 
//When subpage => true, the subpage condition is considered.
    $selected = true;
    while($page = mysqli_fetch_assoc($pages)) { //The listing of the objects 
        /*echo "page id: " . $page_id . " & order: " . $order; */?>
    <li class="
    <?php
        if($page['id'] == $page_id) { 
                $selected = true;
            } 
        else { $selected = false; }
            
        if($page['subpage'] == true) {
            if($selected) { echo "selected_dim"; } 
            else { echo "passive_dim"; }
        }
        else {
            if($selected) { echo "selected"; } 
            else { echo "passive"; }
        }
    ?>

    ">
        <a style="text-decoration:none" href=<?php 
            echo url_for('index.php?id=' . h(u($page['id'])))?> >
            <?php echo h($page['title']); ?> 
        </a>
    </li>
    <?php 
    } ?>

<?php mysqli_free_result($pages); ?>