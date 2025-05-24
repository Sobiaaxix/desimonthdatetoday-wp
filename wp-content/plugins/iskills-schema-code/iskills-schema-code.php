<?php
/*
Plugin Name: iSkills Schema Code
Description: Adds a custom code input box for schema markup to each post and page and displays the code in the head section.
Version: 1.0
Author: M Tanveer Nandla
*/

// Add a custom meta box
function isc_add_schema_code_meta_box() {
    add_meta_box(
        'schema_code_meta_box',
        'iSkills Schema Markup Code',
        'isc_display_schema_code_meta_box',
        array('post', 'page'), // Add 'page' to the array to include pages
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'isc_add_schema_code_meta_box');

// Display the custom meta box
function isc_display_schema_code_meta_box($post) {
    $schema_code = get_post_meta($post->ID, 'isc_schema_code', true);
    wp_nonce_field(basename(__FILE__), 'isc_schema_code_nonce');
    ?>
    <style>
        .isc-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        #isc_schema_code {
            width: 100%;
            padding: 10px;
            font-family: monospace;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        .isc-copy-button {
            padding: 8px 16px;
            background-color: #0073aa;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .isc-copy-button:hover {
            background-color: #006799;
        }
        .isc-test-link {
            text-align: right;
        }
    </style>
    <div class="isc-container">
        <textarea id="isc_schema_code" name="isc_schema_code" rows="5"><?php echo esc_textarea($schema_code); ?></textarea>
        <button type="button" class="isc-copy-button" onclick="copyToClipboard()">Copy to Clipboard</button>
        <div class="isc-test-link">
            Test your schema markup with Google's <a href="https://search.google.com/test/rich-results" target="_blank">Rich Results Test</a>.
        </div>
    </div>
    <script>
    function copyToClipboard() {
        var copyText = document.getElementById("isc_schema_code");
        copyText.select();
        document.execCommand("copy");
    }
    </script>
    <?php
}

// Save the schema code
function isc_save_schema_code_meta_box($post_id) {
    if (!isset($_POST['isc_schema_code_nonce']) || !wp_verify_nonce($_POST['isc_schema_code_nonce'], basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['isc_schema_code'])) {
        $sanitized_code = isc_sanitize_schema_code($_POST['isc_schema_code']);
        update_post_meta($post_id, 'isc_schema_code', $sanitized_code);
    }
}

function isc_sanitize_schema_code($code) {
    $allowed_html = array(
        'script' => array(
            'type' => array()
        )
    );
    return wp_kses($code, $allowed_html);
}

add_action('save_post', 'isc_save_schema_code_meta_box');

// Insert the schema code into the head section
function isc_insert_schema_code_in_head() {
    if (is_single() || is_page()) {
        global $post;
        $schema_code = get_post_meta($post->ID, 'isc_schema_code', true);
        if (!empty($schema_code)) {
            echo $schema_code;
        }
    }
}
add_action('wp_head', 'isc_insert_schema_code_in_head');
?>