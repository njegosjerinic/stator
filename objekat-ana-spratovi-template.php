<?php
/*
Template Name: Objekat Ana Spratovi 
*/
get_header();
?>

<section class="objekat-ana-container">
    <div class="objekat-ana-title">
        <h1>Stanovi u izgradnji / <?php the_title(); ?></h1>
    </div>
    <?php
    $lamela = 'objekat-ana-lamela-1';
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    if (strpos($request_uri, 'objekat-ana-lamela-2') !== false) {
        $lamela = 'objekat-ana-lamela-2';
    }

    $spratovi = [
        ['slug' => 'prvi-sprat', 'img' => 'prvi sprat.png'],
        ['slug' => 'drugi-sprat', 'img' => 'drugi sprat.png'],
        ['slug' => 'treci-sprat', 'img' => 'treći sprat.png'],
        ['slug' => 'cetvrti-sprat', 'img' => 'četvrti sprat.png'],
        ['slug' => 'peti-sprat', 'img' => 'peti sprat.png'],
        ['slug' => 'sesti-sprat', 'img' => 'šesti sprat.png'],
        ['slug' => 'povucena-etaza', 'img' => 'povučena etaža.png'],
        ['slug' => 'garazna-mjesta', 'img' => 'garažna mjesta.png'],
        ['slug' => 'ostave', 'img' => 'ostave.png'],
    ];
    ?>

    <div class="objekat-ana">
        <?php foreach ($spratovi as $sprat): ?>
            <a href="<?php echo site_url($lamela . '-' . $sprat['slug']); ?>">
                <img src="<?php echo get_theme_file_uri('images/' . $sprat['img']); ?>" alt="">
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php get_footer(); ?>
