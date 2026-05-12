<?php

get_header();

while (have_posts()) {
    the_post();
    ?>
    <div class="homepage">
        <h2 class="title"><?php the_title(); ?></h2>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
}

get_footer();

?>
