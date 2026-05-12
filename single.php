<?php get_header(); ?>

<div class="apartment-container" style="max-width: 900px; margin: 0 auto; padding: 20px;">
    
    <!-- Apartment Title -->
    <h3 class="apartment-title" style="text-align: start; margin-bottom: 20px;">
        <?php the_title(); ?>
    </h3>

    <!-- Main Featured Image -->
    <div class="apartment-main-image" style="text-align: center; margin-bottom: 20px;">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('large', ['style' => 'max-width:100%; height:auto; border-radius:8px;']); ?>
        <?php endif; ?>
    </div>

    <!-- Two Extra Images -->
    <div class="apartment-extra-images" style="display: flex; justify-content: center; gap: 15px;">
        <?php 
        // Assuming you use custom fields for the extra images
        $image1 = get_field('apartment_image_1'); 
        $image2 = get_field('apartment_image_2');


        if ($image1) {
            echo '<img src="' . esc_url($image1) . '" alt="Apartment extra 1">';
        }

        if ($image2) {
            echo '<img src="' . esc_url($image2) . '" alt="Apartment extra 2">';
        }
        ?>
    </div>

    <!-- Content Area (optional for details) -->
    <div class="apartment-description" style="margin-top: 30px;">
        <?php the_content(); ?>
    </div>
	<div class="zirat-img">
		<a href="https://ziraatbank.ba/">
			<img src="https://statorgs.com/wp-content/uploads/2026/03/ziraat_bankasi-logo_brandlogos.net_tvukz.png">
		</a>
	</div>

</div>

<?php get_footer(); ?>
