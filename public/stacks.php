        while($section = mysqli_fetch_assoc($sections)) {  
            if(/*$tmln_collapsed && */$section['timeline_id'] == $page_id) { 
                // echo "collapse " . $timeline['timeline_id']; ?>
            <li class="
                <?php

                    if($section_selected && $section['section_id'] == $id)
                    {   collapse_section($section);
                        echo "selected_section";  } 
                    else { echo "passive_section"; }          
                ?>
                ">
                <a style="text-decoration:none" href=<?php 
                    echo url_for('index.php?section_id=' . h(u($section['section_id'])))?> >
                    <?php echo h($section['title']) . " sec id: " . $section['section_id'] .
                    " tim id: " . $section['timeline_id']; 
                    collapse_section($section); ?> 
                </a>
            </li>
            <?php //ADVICES
                $advices = find_advices($varda_id, $section['section_id']);
                #echo $varda_id . " & " . $section['id'];
                if($section['collapsed'] && $timeline['collapsed']) {
                while($advice = mysqli_fetch_assoc($advices)) {
                    if(/*$tmln_collapsed && */$advice['timeline_id'] == $page_id) {  ?>
                    <li class="
                        <?php
            
                        if($advice_selected && $advice['advice_id'] == $id) { 
                            echo "selected_advice";
                            } 
                        else { echo "passive_advice"; }    ?>
                    ">
                        <a style="text-decoration:none" href=<?php 
                            echo url_for('index.php?advice_id=' . h(u($advice['advice_id'])))?> >
                            <?php echo h($advice['title'] . " sec id: " . $advice['section_id'] .
                        " adv id: " . $advice['advice_id']); ?> 
                        </a>
                    </li>
                <?php
                    }
                }
                } //if
            }
        }