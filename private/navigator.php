<?php 

/*

pick timeline t1
if advice a is selected:
    check the section s to which a belongs
    check the timeline t to which s belongs
    if t1 equals t:
        print t1 as active
        print all sections of t1:
        if section equals s:
            as active
            print all advices of s:
            if advice equals a:
                as active
                print all messages
            else:
                as passive
        else:
            as passive 
    else:
        print t1 as passive
    
if section s is selected:
    check the timeline t to which s belongs
    if t1 equals t:
        print t1 as active
        print all sections of t1:
        if section equals s:
            as active
            print all advices
        else:
            as passive 
    else:
        print t1 as passive
    
if timeline t is selected:
    if t1 equals t:
        print as active
        print all sections
    else:
        print as passive

pick next timeline t2

*/
// echo "navigator " . $page_id;
//$varda_id = 2;
//all timelines for this clinic is retrieved

$varda_id = 2;
$pages = find_tmlns($varda_id); 
$sections = find_sections($varda_id);
$advices = find_advices($varda_id);
$products = find_products($varda_id);


if($advice_selected) {
    //$sctn = find_section_by_id($page_id);
    $adv = find_advice_by_id($page_id);
    $sctn = find_section_by_id($adv['section_id']);
    $tmln = find_timeline_by_id($sctn['timeline_id']);
    echo "advice with id=" . $page_id . " was used to find timeline with id=" .
    $tmln['timeline_id'] . " and section with id=" . $sctn['section_id'];
    while($timeline = mysqli_fetch_assoc($pages)) { 
        if($timeline['timeline_id'] == $tmln['timeline_id']) { ?>
            <li class=" <?php echo "selected_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title']); ?>
            </li>
            <ul>
            <?php
            $sections = find_sections_by_timeline_id($timeline['timeline_id']);
            while($section = mysqli_fetch_assoc($sections)) {
                if($section['section_id'] == $sctn['section_id']) {
                    //echo " section "; ?>
                    <li class=" <?php echo "selected_section"; ?> ">
                        <a style="text-decoration:none" href=
                        <?php 
                        echo url_for("/index.php?section_id=" . $section['section_id']);
                        ?> >
                        <?php echo h($section['section_title'] . 
                        " with id=" . $section['section_id']); ?>
                    </li>
                    <ul>
                    <?php
                    $advices = find_advices_by_section_id($section['section_id']);
                    while($advice = mysqli_fetch_assoc($advices)) { ?>
                        <?php
                        if($advice['advice_id'] == $adv['advice_id']) { ?>
                            <li class=" <?php echo "selected_advice"; ?> ">
                                <a style="text-decoration:none" href=
                                <?php 
                                echo url_for("/index.php?advice_id=" . $advice['advice_id']);
                                ?> >
                                <?php echo h($advice['advice_title'] . " with id=" .
                                $advice['advice_id'] . " of section " . $section['section_id']); ?>
                            </li>
                            <ul>
                            <?php
                            $products = find_products_by_advice_id($advice['advice_id']);
                            while($product = mysqli_fetch_assoc($products)) { ?>
                                <li class="passive_product">
                                    <a style="text-decoration:none" href=
                                    <?php 
                                    echo url_for("/index.php?product_id=" . $product['product_id']);
                                    ?> >
                                    <?php echo h($product['product_name']); ?>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                            <?php
                        }
                        else { ?>
                            <li class=" <?php echo "passive_advice"; ?> ">
                                <a style="text-decoration:none" href=
                                <?php 
                                echo url_for("/index.php?advice_id=" . $advice['advice_id']);
                                ?> >
                                <?php echo h($advice['advice_title'] . " with id=" .
                                $advice['advice_id'] . " of section " . $section['section_id']); ?>
                            </li>
                            <?php
                        } 
                    }
                    ?>
                    </ul>
                    <?php
                }
                else { ?>
                    <li class=" <?php echo "passive_section"; ?> ">
                        <a style="text-decoration:none" href=
                        <?php 
                        echo url_for("/index.php?section_id=" . $section['section_id']);
                        ?> >
                        <?php echo h($section['section_title'] . 
                        " with id=" . $section['section_id']); ?>
                    </li>
                    <?php
                }
            }
            ?>
            </ul>
            <?php
        }
        else { ?>
            <li class=" <?php echo "passive_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title']); ?>
            </li>
            <?php
        }
    }
}

else if($section_selected) {
    //$sctn = find_section_by_id($page_id);
    $sctn = find_section_by_id($page_id);
    $tmln = find_timeline_by_id($sctn['timeline_id']);
    echo "section with id=" . $page_id . " was used to find timeline with id=" .
    $tmln['timeline_id'];
    while($timeline = mysqli_fetch_assoc($pages)) { 
        if($timeline['timeline_id'] == $tmln['timeline_id']) { ?>
            <li class=" <?php echo "selected_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title']); ?>
            </li>
            <ul>
            <?php
            $sections = find_sections_by_timeline_id($timeline['timeline_id']);
            while($section = mysqli_fetch_assoc($sections)) {
                if($section['section_id'] == $page_id &&
                $section['timeline_id'] == $timeline['timeline_id']) {
                    //echo " section "; ?>
                    <li class=" <?php echo "selected_section"; ?> ">
                        <a style="text-decoration:none" href=
                        <?php 
                        echo url_for("/index.php?section_id=" . $section['section_id']);
                        ?> >
                        <?php echo h($section['section_title'] . 
                        " with id=" . $section['section_id'] . " equals
                        page id=" . $page_id); ?>
                    </li>
                    <ul>
                    <?php
                    $advices = find_advices_by_section_id($section['section_id']);
                    while($advice = mysqli_fetch_assoc($advices)) { ?>
                        <li class="passive_advice">
                            <a style="text-decoration:none" href=
                            <?php 
                            echo url_for("/index.php?advice_id=" . $advice['advice_id']);
                            ?> >
                            <?php echo h($advice['advice_title'] . " with id=" .
                            $advice['advice_id'] . " belongs to section with id=" .
                            $section['section_id'] . " and timeline with id=" . 
                            $timeline['timeline_id']); ?>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                    <?php
                }
                else { ?>
                    <li class=" <?php echo "passive_section"; ?> ">
                        <a style="text-decoration:none" href=
                        <?php 
                        echo url_for("/index.php?section_id=" . $section['section_id']);
                        ?> >
                        <?php echo h($section['section_title'] . 
                        " with id=" . $section['section_id'] . " does not equal
                        page id=" . $page_id); ?>
                    </li>
                    <?php
                }
            }
            ?>
            </ul>
            <?php
        }
        else { ?>
            <li class=" <?php echo "passive_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title']); ?>
            </li>
            <?php
        }
    }
}

else if($timeline_selected) {
    //echo " timeline selected";
    while($timeline = mysqli_fetch_assoc($pages)) { 
        if($timeline['timeline_id'] == $page_id) { ?>
            <li class=" <?php echo "selected_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title'] . 
                " with id=" . $timeline['timeline_id'] . " equals
                page id=" . $page_id); ?>
            </li>
            <ul>
            <?php
            $sections = find_sections_by_timeline_id($timeline['timeline_id']);
            while($section = mysqli_fetch_assoc($sections)) { ?>
                <li class="passive_section">
                    <a style="text-decoration:none" href=
                    <?php 
                    echo url_for("/index.php?section_id=" . $section['section_id']);
                    ?> >
                    <?php echo h($section['section_title'] . " with id=" .
                    $section['section_id'] . " belongs to timeline with id=" . 
                    $timeline['timeline_id'] . " and section id=" .
                    $timeline['section_id']); ?>
                </li>
                <?php
            } 
            ?>
            </ul>
            <?php
        }
        else { ?>
            <li class=" <?php echo "passive_timeline"; ?> ">
                <a style="text-decoration:none" href=
                <?php 
                echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
                ?> >
                <?php echo h($timeline['timeline_title']); ?>
            </li>
            <?php
        }
    }
}

else {
    echo "else! ";
    //$tmln = find_timeline_by_id($varda_id);
    while($timeline = mysqli_fetch_assoc($pages)) { echo " testing "; ?>
        <li class="passive_timeline">
            <a style="text-decoration:none" href=
            <?php 
            echo url_for("/index.php?timeline_id=" . $timeline['timeline_id']);
            ?> > 
            <?php echo h($timeline['timeline_title']); ?>
            BB
        </li>
        <?php
    }
}

mysqli_free_result($pages);
mysqli_free_result($sections);
mysqli_free_result($advices);
mysqli_free_result($products);
?>