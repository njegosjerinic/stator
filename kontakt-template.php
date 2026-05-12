<?php
/*
Template Name: Kontakt Template
*/
get_header();

while (have_posts()) {
    the_post();
    ?>
    <div class="homepage">
        <h2 class="title"><?php the_title(); ?></h2>
        <div class="kontakt-content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
}

get_footer();

?>