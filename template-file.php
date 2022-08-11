<?php

$images = get_sub_field('images');
$total = count(get_sub_field('images'));
$display = 6;
$count = 0;
$maxPage = ceil($total / $display);

?>


<?php if( have_rows('images')) { ?>
    <section class="gallery">

        <ul class="gallery__list">
            <?php while( have_rows('images')) { the_row(); ?>

                <?php $count++; ?>
                <li>
                    <?php echo the_sub_field('image'); ?>
                </li>

                <?php if( $count == $display) { break; } ?>

            <? } ?>
        </ul>

        <?php if($count < $total) { ?>
            <a id="loadMore" display="<?php echo $display; ?>" post-id="<?php echo $post->ID; ?>" total="<? echo $total; ?>" max-page="<?php echo $maxPage; ?>" page="1" class="button" href="#">
                <p>Load more</p>
            </a>
        <?php } ?>

    </section>
<?php } ?>
