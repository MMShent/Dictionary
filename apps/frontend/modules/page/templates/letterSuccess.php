<?php if($words) { ?>
    <ul class="letterList">

        <?php foreach($words as $key=>$term) { ?>

            <li>
                <?php echo link_to($term->getWord(), '@term?term='.$term->getWord()) ?>
            </li>
            
        <?php } ?>
    </ul>
<?php } ?>