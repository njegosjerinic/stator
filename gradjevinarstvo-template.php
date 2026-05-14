<?php
/*
Template Name: Građevinarstvo Page
*/
get_header();
?>
<section class="gradjevinarstvo">
    <div class="gradjevinarstvo-wrapper w1000">
        <div class="gradjevinarstvo-title">
            <h2>Stambeni objekat ANA Doboj</h2>
        </div>
        <a href="<?php echo site_url('objekat-ana-lamela-1') ?>" class="gradj-cont">
            <img src="https://statorgs.com/wp-content/uploads/2026/03/ana-1.png" alt="Ana Objekt">
        </a>
        <a href="<?php echo site_url('objekat-ana-lamela-2') ?>" class="gradj-cont">
            <img src="https://statorgs.com/wp-content/uploads/2026/03/ana-2.png" alt="Ana Objekt">
        </a>
        <a href="#" class="gradj-cont">
            <img src="https://statorgs.com/wp-content/uploads/2026/03/spo-milica.png" alt="Ana Objekt">
        </a>
        <a href="#" class="gradj-cont">
            <img src="https://statorgs.com/wp-content/uploads/2026/03/spo-stator.png" alt="Ana Objekt">
        </a>
        <div class="gradjevinarstvo-text-container " class="gradj-cont">
            <p>U toku je prodaja stanova u izgradnji, pogledajte ponudu stanova u stambenom objektu "ANA" u ulici Nikole
                Tesle u Doboju</p>
        </div>
        <div class="ana-caurousel">
            <div class="arrows ">
                <div id="rightArrow" class="right-arrow">&#62;</div>
                <div id="leftArrow" class="left-arrow">&#60;</div>
            </div>
            <div class="ana-carousel-item" style="display:block;">
                <img src="<?php echo get_theme_file_uri('images/ana.jpg'); ?>" alt="Ana Objekt">
            </div>
            <div class="ana-carousel-item">
                <img src="<?php echo get_theme_file_uri('images/viber_slika_2025-11-04_10-02-53-008.jpg'); ?>"
                    alt="Ana Objekt">
            </div>
            <div class="ana-carousel-item">
                <img src="<?php echo get_theme_file_uri('images/viber_slika_2025-11-04_10-02-55-135.jpg'); ?>"
                    alt="Ana Objekt">
            </div>
            <div class="ana-dots-container">
                <span class="ana-dot active"></span>
                <span class="ana-dot"></span>
                <span class="ana-dot"></span>
            </div>
        </div>
        <div class="ana-description-location">
            <h3>Lokacija</h3>
            <p>Stambeni objekat "ANA" se gradi u Doboju, u neposrednoj blizini trznog centra City Park i nove
                saobracajnice koja se proteze od bulevara do ulice Nikole Tesle</p>
            <img src="<?php echo get_theme_file_uri('images/ana-lokacija.jpg'); ?>" alt="Lokacija Ana Objekta">
        </div>
    </div>
</section>
<?php get_footer(); ?>