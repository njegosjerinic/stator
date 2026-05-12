<?php
// Schedule cron (once)
add_action('init', function () {
    if (! wp_next_scheduled('update_tablepress_from_sheets')) {
        wp_schedule_event(time(), 'hourly', 'update_tablepress_from_sheets');
    }
});

// Cron callback – NO CLOSURE
function stator_update_tablepress_from_sheets() {

    $table_id = '3';

    $csv_url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vThxWxuxVZIkrQKTy72jfe2dqI48SRq9cAO5it-rdhBjimLHPmhA04YfP9wR-Xq3FtZm2wMDZz507iz/pub?output=csv';

    $response = wp_remote_get($csv_url);

    if (is_wp_error($response)) {
        error_log('TablePress Sync Error: ' . $response->get_error_message());
        return;
    }

    $csv_data = wp_remote_retrieve_body($response);

    if (empty($csv_data)) {
        error_log('TablePress Sync Error: Empty CSV');
        return;
    }

    $rows = array_map('str_getcsv', explode("\n", trim($csv_data)));

    if (class_exists('TablePress')) {
        $model_table = TablePress::$model_table;
        $model_table->save(array(
            'id'   => $table_id,
            'data' => $rows,
        ));
    }
}

add_action('update_tablepress_from_sheets', 'stator_update_tablepress_from_sheets');

wp_enqueue_style(
    'stator-style',
    get_parent_theme_file_uri('css/custom-style.css'),
    array(),
    time(),
    'all'
);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'stator-main-js',
        get_theme_file_uri('js/custom-script.js'),
        array(),
        wp_get_theme()->get('Version'),
        true // učitaj u footeru
    );
});

add_action('admin_init', function () {
    if (isset($_GET['test_tablepress_sync'])) {
        do_action('update_tablepress_from_sheets');
        echo 'TablePress sync triggered.';
        exit;
    }
});