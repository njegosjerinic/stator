<?php
/* Template Name: Floor Template */

get_header();

// === CONFIGURATION ===
$tablepress_id   = 3;
$apartment_col   = 'Naziv';

// === YOUR MANUAL SETTINGS (PROMIJENI OVO!) =========================

// GARAŽE — Lamela 1
$start_l1_garaze = 70;     // PRVI RED u TablePress tabeli (0-based)
$total_l1_garaze = 16;    // ukupan broj

// GARAŽE — Lamela 2
$start_l2_garaze = 170;
$total_l2_garaze = 20;

// OSTAVE — Lamela 1
$start_l1_ostave = 86;
$total_l1_ostave = 6;

// OSTAVE — Lamela 2
$start_l2_ostave = 190;
$total_l2_ostave = 8;

// ===================================================================


// === LOAD TABLEPRESS DATA ===
if (!class_exists('TablePress')) {
    echo '<p>TablePress plugin nije aktivan.</p>';
    get_footer();
    exit;
}

$table = TablePress::$model_table->load($tablepress_id, true, true);

if (empty($table['data'])) {
    echo '<p>Nema podataka u tabeli.</p>';
    get_footer();
    exit;
}

// Parse tabela
$headers         = $table['data'][0];
$all_apartments  = array_slice($table['data'], 1);

// DETECT SLUG
$slug       = basename(get_permalink());
$slug_lower = strtolower($slug);

// Default (spratovi)
$use_split       = false;
$rows_per_floor  = 10;
$floor_number    = get_field('floor_number') ?: 1;
$start           = ($floor_number - 1) * $rows_per_floor;

// ======================================================================
// === POSEBNE STRANICE — GARAŽE I OSTAVE (manual start + total) ========
// ======================================================================

// GARAŽE — LAMELA 1
if ($slug_lower === 'objekat-ana-lamela-1-garazna-mjesta') {

    $start          = $start_l1_garaze;
    $rows_per_floor = $total_l1_garaze;

    $use_split = true;
    $split_1   = intval($total_l1_garaze / 2); // 8
    $split_2   = $total_l1_garaze - $split_1; // 8
}

// GARAŽE — LAMELA 2
elseif ($slug_lower === 'objekat-ana-lamela-2-garazna-mjesta') {

    $start          = $start_l2_garaze;
    $rows_per_floor = $total_l2_garaze;

    $use_split = true;
    $split_1   = intval($total_l2_garaze / 2); // 9
    $split_2   = $total_l2_garaze - $split_1; // 9
}

// OSTAVE — LAMELA 1
elseif ($slug_lower === 'objekat-ana-lamela-1-ostave') {

    $start          = $start_l1_ostave;
    $rows_per_floor = $total_l1_ostave;

    $use_split = false;
}

// OSTAVE — LAMELA 2
elseif ($slug_lower === 'objekat-ana-lamela-2-ostave') {

    $start          = $start_l2_ostave;
    $rows_per_floor = $total_l2_ostave;

    $use_split = false;
}

// ======================================================================
// === UZIMANJE PODATAKA IZ TABELЕ =======================================
// ======================================================================

$floor_apartments = array_slice($all_apartments, $start, $rows_per_floor);
$apartment_index  = array_search($apartment_col, $headers);
?>

<div class="spratovi-wrapper">
    <div class="spratovi">

        <h3><?php the_title(); ?></h3>

        <div class="floor-container">

            <?php if ($use_split === false): ?>

                <!-- NORMALNI SPRAT ILI OSTAVE (bez split-a) -->
                <table class="apartments-table" style="width:100%;border-collapse:collapse;">
                    <tbody>
                        <?php foreach ($floor_apartments as $row): ?>
                            <?php
                            $status_index = array_search('Status', $headers);
                            $status       = $row[$status_index] ?? '';
                            $status_class = strtolower($status);
                            ?>
                            <tr class="<?php echo esc_attr($status_class); ?>">
                                <?php foreach ($row as $i => $cell): ?>
                                    <td>
                                        <?php
                                        if ($i === $apartment_index) {
                                            $slug = sanitize_title($cell);
                                            $post = get_page_by_path($slug, OBJECT, 'post');

                                            if ($post) {
                                                echo '<a href="' . get_permalink($post->ID) . '">' . esc_html($cell) . '</a>';
                                            } else {
                                                echo esc_html($cell);
                                            }
                                        } else {
                                            echo esc_html($cell);
                                        }
                                        ?>
                                    </td>
                                <?php endforeach; ?>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    <?php else: ?>
        <div style="display: flex;flex-direction:column">
            <!-- GARAŽE — PODJELA U DVIJE SEKCIJE -->
            <?php
                $section_a = array_slice($floor_apartments, 0, $split_1);
                $section_b = array_slice($floor_apartments, $split_1, $split_2);
            ?>
            <div style="display: flex;flex-direction:column">
                <h3 style="margin-top:25px;">Garažna mjesta – Sekcija A</h3>
                <table class="apartments-table" style="width:100%;border-collapse:collapse;">
                    <tbody>
                        <?php foreach ($section_a as $row): ?>
                            <?php
                            $status_index = array_search('Status', $headers);
                            $status       = $row[$status_index] ?? '';
                            $status_class = strtolower($status);
                            ?>
                            <tr class="<?php echo esc_attr($status_class); ?>">
                                <?php foreach ($row as $cell): ?>
                                    <td><?php echo esc_html($cell); ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div style="display: flex;flex-direction:column">
                <h3 style="margin-top:35px;">Garažna mjesta – Sekcija B</h3>
                <table class="apartments-table" style="width:100%;border-collapse:collapse;">
                    <tbody>
                        <?php foreach ($section_b as $row): ?>
                            <?php
                            $status_index = array_search('Status', $headers);
                            $status       = $row[$status_index] ?? '';
                            $status_class = strtolower($status);
                            ?>
                            <tr class="<?php echo esc_attr($status_class); ?>">
                                <?php foreach ($row as $cell): ?>
                                    <td><?php echo esc_html($cell); ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <?php the_content(); ?>
    </div>
</div>
</div>

<style>
    tr.sold {
        background-color: #ffcccc;
    }

    tr.available {
        background-color: #ccffcc;
    }

    .apartments-table td {
        padding: 8px;
        border-bottom: 1px solid #f0f0f0;
    }
</style>

<?php get_footer(); ?>