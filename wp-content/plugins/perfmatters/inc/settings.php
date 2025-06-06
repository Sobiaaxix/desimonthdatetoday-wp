<?php
//register settings + options
function perfmatters_settings() {

	if(get_option('perfmatters_options') == false) {	
		add_option('perfmatters_options', perfmatters_default_options());
	}

    $perfmatters_options = get_option('perfmatters_options');
    $perfmatters_tools = get_option('perfmatters_tools');

    /* options primary section
    /**********************************************************/
    add_settings_section('perfmatters_options', __('Core', 'perfmatters'), '__return_false', 'perfmatters_options');

    //disable emojis
    add_settings_field(
    	'disable_emojis', 
    	perfmatters_title(__('Disable Emojis', 'perfmatters'), 'disable_emojis', 'https://perfmatters.io/docs/disable-emojis-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
            'id' => 'disable_emojis',
            'tooltip' => __('Removes WordPress Emojis JavaScript file (wp-emoji-release.min.js).', 'perfmatters')
        )
    );

    //disable dashicons
    add_settings_field(
        'disable_dashicons', 
        perfmatters_title(__('Disable Dashicons', 'perfmatters'), 'disable_dashicons', 'https://perfmatters.io/docs/remove-dashicons-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_dashicons',
            'tooltip' => __('Disables dashicons on the front end when not logged in.', 'perfmatters')
        )
    );

    //disable embeds
    add_settings_field(
    	'disable_embeds', 
    	perfmatters_title(__('Disable Embeds', 'perfmatters'), 'disable_embeds', 'https://perfmatters.io/docs/disable-embeds-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'disable_embeds',
    		'tooltip' => __('Removes WordPress Embed JavaScript file (wp-embed.min.js).', 'perfmatters')   		
    	)
    );

	//disable xml-rpc
    add_settings_field(
    	'disable_xmlrpc', 
    	perfmatters_title(__('Disable XML-RPC', 'perfmatters'), 'disable_xmlrpc', 'https://perfmatters.io/docs/disable-xml-rpc-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'disable_xmlrpc',
    		'tooltip' => __('Disables WordPress XML-RPC functionality.', 'perfmatters')
    	)
    );

	//remove jquery migrate
    add_settings_field(
    	'remove_jquery_migrate', 
    	perfmatters_title(__('Remove jQuery Migrate', 'perfmatters'), 'remove_jquery_migrate', 'https://perfmatters.io/docs/remove-jquery-migrate-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'remove_jquery_migrate',
    		'tooltip' => __('Removes jQuery Migrate JavaScript file (jquery-migrate.min.js).', 'perfmatters')
    	)
    );

    //hide wp version
    add_settings_field(
    	'hide_wp_version', 
    	perfmatters_title(__('Hide WP Version', 'perfmatters'), 'hide_wp_version', 'https://perfmatters.io/docs/remove-wordpress-version-number/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'hide_wp_version',
    		'tooltip' => __('Removes WordPress version meta tag.', 'perfmatters')
    	)
    );

    //remove rsd link
    add_settings_field(
    	'remove_rsd_link', 
    	perfmatters_title(__('Remove RSD Link', 'perfmatters'), 'remove_rsd_link', 'https://perfmatters.io/docs/remove-rsd-link-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'remove_rsd_link',
    		'tooltip' => __('Remove RSD (Real Simple Discovery) link tag.', 'perfmatters')
    	)
    );

    //remove shortlink
    add_settings_field(
    	'remove_shortlink', 
    	perfmatters_title(__('Remove Shortlink', 'perfmatters'), 'remove_shortlink', 'https://perfmatters.io/docs/remove-shortlink-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'remove_shortlink',
    		'tooltip' => __('Remove Shortlink link tag.', 'perfmatters')
    	)
    );

    //disable rss feeds
    add_settings_field(
    	'disable_rss_feeds', 
    	perfmatters_title(__('Disable RSS Feeds', 'perfmatters'), 'disable_rss_feeds', 'https://perfmatters.io/docs/disable-rss-feeds-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'disable_rss_feeds',
    		'tooltip' => __('Disable WordPress generated RSS feeds and 301 redirect URL to parent.', 'perfmatters')
    	)
    );

    //remove feed links
    add_settings_field(
    	'remove_feed_links', 
    	perfmatters_title(__('Remove RSS Feed Links', 'perfmatters'), 'remove_feed_links', 'https://perfmatters.io/docs/remove-rss-feed-links-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'remove_feed_links',
    		'tooltip' => __('Disable WordPress generated RSS feed link tags.', 'perfmatters')
    	)
    );

    //disable self pingbacks
    add_settings_field(
    	'disable_self_pingbacks', 
    	perfmatters_title(__('Disable Self Pingbacks', 'perfmatters'), 'disable_self_pingbacks', 'https://perfmatters.io/docs/disable-self-pingbacks-wordpress/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'disable_self_pingbacks',
    		'tooltip' => __('Disable Self Pingbacks (generated when linking to an article on your own blog).', 'perfmatters')
    	)
    );

    //disable rest api
    add_settings_field(
    	'disable_rest_api', 
    	perfmatters_title(__('Disable REST API', 'perfmatters'), 'disable_rest_api', 'https://perfmatters.io/docs/disable-wordpress-rest-api/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'disable_rest_api',
    		'input' => 'select',
    		'options' => array(
    			''                   => __('Default (Enabled)', 'perfmatters'),
    			'disable_non_admins' => __('Disable for Non-Admins', 'perfmatters'),
    			'disable_logged_out' => __('Disable When Logged Out', 'perfmatters')
    		),
    		'tooltip' => __('Disables REST API requests and displays an error message if the requester doesn\'t have permission.', 'perfmatters')
    	)
    );

    //remove rest api links
    add_settings_field(
    	'remove_rest_api_links', 
    	perfmatters_title(__('Remove REST API Links', 'perfmatters'), 'remove_rest_api_links', 'https://perfmatters.io/docs/remove-wordpress-rest-api-links/'), 
    	'perfmatters_print_input', 
    	'perfmatters_options', 
    	'perfmatters_options', 
    	array(
    		'id' => 'remove_rest_api_links',
    		'tooltip' => __('Removes REST API link tag from the front end and the REST API header link from page requests.', 'perfmatters')
    	)
    );

    //disable google maps
    add_settings_field(
        'disable_google_maps', 
        perfmatters_title(__('Disable Google Maps', 'perfmatters'), 'disable_google_maps', 'https://perfmatters.io/docs/disable-google-maps-api-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_google_maps',
            'class' => 'perfmatters-input-controller',
            'tooltip' => __('Removes any instances of Google Maps being loaded across your entire site.', 'perfmatters')
        )
    );

    //disable google maps exclusions
    add_settings_field(
        'disable_google_maps_exclusions', 
        perfmatters_title(__('Exclude Post IDs', 'perfmatters'), 'disable_google_maps_exclusions', 'https://perfmatters.io/docs/disable-google-maps-api-wordpress/#exclude'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_google_maps_exclusions',
            'input' => 'text',
            'placeholder' => '23,19,blog',
            'class' => 'disable_google_maps' . (empty($perfmatters_options['disable_google_maps']) ? ' hidden' : ''),
            'tooltip' => __('Prevent Google Maps from being disabled on specific post IDs. Format: comma separated', 'perfmatters')
        )
    );

    //disable password strength meter
    add_settings_field(
        'disable_password_strength_meter', 
        perfmatters_title(__('Disable Password Strength Meter', 'perfmatters'), 'disable_password_strength_meter', 'https://perfmatters.io/docs/disable-password-meter-strength/'),
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_password_strength_meter',
            'tooltip' => __('Removes WordPress and WooCommerce Password Strength Meter scripts from non essential pages.', 'perfmatters')
        )
    );

    //disable comments
    add_settings_field(
        'disable_comments', 
        perfmatters_title(__('Disable Comments', 'perfmatters'), 'disable_comments', 'https://perfmatters.io/docs/wordpress-disable-comments/'),
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_comments',
            'tooltip' => __('Disables WordPress comments across your entire site.', 'perfmatters')
        )
    );

    //remove comment urls
    add_settings_field(
        'remove_comment_urls', 
        perfmatters_title(__('Remove Comment URLs', 'perfmatters'), 'remove_comment_urls', 'https://perfmatters.io/docs/remove-wordpress-comment-author-link'),
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'remove_comment_urls',
            'tooltip' => __('Removes the WordPress comment author link and website field from blog posts.', 'perfmatters')
        )
    );

    //blank favicon
    add_settings_field(
        'blank_favicon', 
        perfmatters_title(__('Add Blank Favicon', 'perfmatters'), 'blank_favicon', 'https://perfmatters.io/docs/blank-favicon/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'blank_favicon',
            'tooltip' => __('Adds a blank favicon to your WordPress header, which will prevent a missing favicon or 404 error. If you already have a favicon on your site, you should leave this off. ', 'perfmatters')
        )
    );

    //remove global styles
    add_settings_field(
        'remove_global_styles', 
        perfmatters_title(__('Remove Global Styles', 'perfmatters'), 'remove_global_styles', 'https://perfmatters.io/docs/remove-global-inline-styles-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'remove_global_styles',
            'tooltip' => __('Remove the inline global styles (CSS and SVG code) related to duotone filters.', 'perfmatters')
        )
    );

    //separate block styles
    add_settings_field(
        'separate_block_styles', 
        perfmatters_title(__('Separate Block Styles', 'perfmatters'), 'separate_block_styles', 'https://perfmatters.io/docs/separate-core-block-styles-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'separate_block_styles',
            'tooltip' => __('Load core block styles only when they are rendered instead of in a global stylesheet.', 'perfmatters')
        )
    );

    //disable heartbeat
    add_settings_field(
        'disable_heartbeat', 
        perfmatters_title(__('Disable Heartbeat', 'perfmatters'), 'disable_heartbeat', 'https://perfmatters.io/docs/disable-wordpress-heartbeat-api/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'disable_heartbeat',
            'input' => 'select',
            'options' => array(
                ''                   => __('Default', 'perfmatters'),
                'disable_everywhere' => __('Disable Everywhere', 'perfmatters'),
                'allow_posts'        => __('Only Allow When Editing Posts/Pages', 'perfmatters')
            ),
            'tooltip' => __('Disable WordPress Heartbeat everywhere or in certain areas (used for auto saving and revision tracking).', 'perfmatters')
        )
    );

    //heartbeat frequency
    add_settings_field(
        'heartbeat_frequency', 
        perfmatters_title(__('Heartbeat Frequency', 'perfmatters'), 'heartbeat_frequency', 'https://perfmatters.io/docs/change-heartbeat-frequency-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'heartbeat_frequency',
            'input' => 'select',
            'options' => array(
                ''   => sprintf(__('%s Seconds', 'perfmatters'), '15') . ' (' . __('Default', 'perfmatters') . ')',
                '30' => sprintf(__('%s Seconds', 'perfmatters'), '30'),
                '45' => sprintf(__('%s Seconds', 'perfmatters'), '45'),
                '60' => sprintf(__('%s Seconds', 'perfmatters'), '60')
            ),
            'tooltip' => __('Controls how often the WordPress Heartbeat API is allowed to run.', 'perfmatters')
        )
    );

    //limit post revisions
    add_settings_field(
        'limit_post_revisions', 
        perfmatters_title(__('Limit Post Revisions', 'perfmatters'), 'limit_post_revisions', 'https://perfmatters.io/docs/disable-limit-post-revisions-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'limit_post_revisions',
            'input' => 'select',
            'options' => array(
                ''      => __('Default', 'perfmatters'),
                'false' => __('Disable Post Revisions', 'perfmatters'),
                '1'     => '1',
                '2'     => '2',
                '3'     => '3',
                '4'     => '4',
                '5'     => '5',
                '10'    => '10',
                '15'    => '15',
                '20'    => '20',
                '25'    => '25',
                '30'    => '30'
            ),
            'tooltip' => __('Limits the maximum amount of revisions that are allowed for posts and pages.', 'perfmatters')
        )
    );

    //autosave interval
    add_settings_field(
        'autosave_interval', 
        perfmatters_title(__('Autosave Interval', 'perfmatters'), 'autosave_interval', 'https://perfmatters.io/docs/change-autosave-interval-wordpress/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_options', 
        array(
            'id' => 'autosave_interval',
            'input' => 'select',
            'options' => array(
                ''      => '1 ' . __('Minute', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                '86400' => __('Disable Autosave Interval', 'perfmatters'),
                '120'   => '2 ' . __('Minutes', 'perfmatters'),
                '180'   => '3 ' . __('Minutes', 'perfmatters'),
                '240'   => '4 ' . __('Minutes', 'perfmatters'),
                '300'   => '5 ' . __('Minutes', 'perfmatters'),
                '600'   => '10 ' . __('Minutes', 'perfmatters'),
                '900'   => '15 ' . __('Minutes', 'perfmatters'),
                '1200'  => '20 ' . __('Minutes', 'perfmatters'),
                '1500'  => '25 ' . __('Minutes', 'perfmatters'),
                '1800'  => '30 ' . __('Minutes', 'perfmatters')
            ),
            'tooltip' => __('Controls how often WordPress will auto save posts and pages while editing.', 'perfmatters')
        )
    );

    //login url options section
    add_settings_section('login_url', __('Login URL', 'perfmatters'), '__return_false', 'perfmatters_options');

    //change login url
    add_settings_field(
        'login_url', 
        perfmatters_title(__('Custom Login URL', 'perfmatters'), 'login_url', 'https://perfmatters.io/docs/change-wordpress-login-url/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'login_url', 
        array(
            'id' => 'login_url',
            'input' => 'text',
            'validate' => '^[a-z0-9-]+$',
            'placeholder' => 'hideme',
            'tooltip' => __('When set, this will change your WordPress login URL (slug) to the provided string and will block wp-admin and wp-login endpoints from being directly accessed.', 'perfmatters')
        )
    );

    //login url behavior
    add_settings_field(
        'login_url_behavior', 
        perfmatters_title(__('Disabled Behavior', 'perfmatters'), 'login_url_behavior', 'https://perfmatters.io/docs/change-wordpress-login-url/#disabled-behavior'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'login_url', 
        array(
            'id' => 'login_url_behavior',
            'input' => 'select',
            'options' => array(
                '' => __('Message', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                '404' => __('404 Template', 'perfmatters'),
                'home' => __('Home URL', 'perfmatters'),
                'redirect' => __('Local Redirect', 'perfmatters')
            ),
            'class' => 'perfmatters-input-controller',
            'tooltip' => __('Change what happens when an original login endpoint is visited.', 'perfmatters')
        )
    );

    //login url message
    add_settings_field(
        'login_url_message', 
        perfmatters_title(__('Message', 'perfmatters'), 'login_url_message', 'https://perfmatters.io/docs/change-wordpress-login-url/#message'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'login_url', 
        array(
            'id' => 'login_url_message',
            'input' => 'text',
            'class' => 'login_url_behavior perfmatters-select-control-' . (!empty($perfmatters_options['login_url_behavior']) ? ' hidden' : ''),
            'placeholder' => __('This has been disabled.', 'perfmatters'),
            'tooltip' => __('Change the disabled message that is displayed.', 'perfmatters')
        )
    );

    //login url redirect
    add_settings_field(
        'login_url_redirect', 
        perfmatters_title(__('Redirect Slug', 'perfmatters'), 'login_url_redirect', 'https://perfmatters.io/docs/change-wordpress-login-url/#local-redirect'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'login_url', 
        array(
            'id' => 'login_url_redirect',
            'input' => 'text',
            'class' => 'login_url_behavior perfmatters-select-control-redirect' . (empty($perfmatters_options['login_url_behavior']) || $perfmatters_options['login_url_behavior'] !== 'redirect' ? ' hidden' : ''),
            'placeholder' => __('404', 'perfmatters'),
            'tooltip' => __('Change the slug that is used for the local redirect.', 'perfmatters')
        )
    );

    if(class_exists('WooCommerce')) {

        //woocommerce options section
        add_settings_section('perfmatters_woocommerce', 'WooCommerce', '__return_false', 'perfmatters_options');

        //disable woocommerce scripts
        add_settings_field(
            'disable_woocommerce_scripts', 
            perfmatters_title(__('Disable Scripts', 'perfmatters'), 'disable_woocommerce_scripts', 'https://perfmatters.io/docs/disable-woocommerce-scripts-and-styles/'), 
            'perfmatters_print_input', 
            'perfmatters_options', 
            'perfmatters_woocommerce', 
            array(
                'id' => 'disable_woocommerce_scripts',
                'tooltip' => __('Disables WooCommerce scripts and styles except on product, cart, and checkout pages.', 'perfmatters')
            )
        );

        //disable woocommerce cart fragmentation
        add_settings_field(
            'disable_woocommerce_cart_fragmentation', 
            perfmatters_title(__('Disable Cart Fragmentation', 'perfmatters'), 'disable_woocommerce_cart_fragmentation', 'https://perfmatters.io/docs/disable-woocommerce-cart-fragments-ajax/'), 
            'perfmatters_print_input', 
            'perfmatters_options', 
            'perfmatters_woocommerce', 
            array(
                'id' => 'disable_woocommerce_cart_fragmentation',
                'tooltip' => __('Disables WooCommerce cart fragmentation script when there are no items in the cart.', 'perfmatters')
            )
        );

        //disable woocommerce status meta box
        add_settings_field(
            'disable_woocommerce_status', 
            perfmatters_title(__('Disable Status Meta Box', 'perfmatters'), 'disable_woocommerce_status', 'https://perfmatters.io/docs/disable-woocommerce-status-meta-box/'), 
            'perfmatters_print_input', 
            'perfmatters_options', 
            'perfmatters_woocommerce', 
            array(
                'id' => 'disable_woocommerce_status',
                'tooltip' => __('Disables WooCommerce status meta box from the WP Admin Dashboard.', 'perfmatters')
            )
        );

        //disable woocommerce widgets
        add_settings_field(
            'disable_woocommerce_widgets', 
            perfmatters_title(__('Disable Widgets', 'perfmatters'), 'disable_woocommerce_widgets', 'https://perfmatters.io/docs/disable-woocommerce-widgets/'), 
            'perfmatters_print_input', 
            'perfmatters_options', 
            'perfmatters_woocommerce', 
            array(
                'id' => 'disable_woocommerce_widgets',
                'tooltip' => __('Disables all WooCommerce widgets.', 'perfmatters')
            )
        );
    }

    /* assets section
    /**********************************************************/
    //add_settings_section('assets', __('Features', 'perfmatters'), '__return_false', 'perfmatters_options');

    //defer js
    add_settings_section('assets_js_defer', __('Defer', 'perfmatters'), '__return_false', 'perfmatters_options');

    //defer js
    add_settings_field(
        'defer_js', 
        perfmatters_title(__('Defer Javascript', 'perfmatters'), 'defer_js', 'https://perfmatters.io/docs/defer-javascript-wordpress/#defer'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_defer', 
        array(
            'id' => 'defer_js',
            'section' => 'assets',
            'tooltip' => __('Add the defer attribute to your JavaScript files.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //defer inline
    add_settings_field(
        'defer_inline', 
        perfmatters_title(__('Include Inline Scripts', 'perfmatters'), 'defer_inline', 'https://perfmatters.io/docs/defer-javascript-wordpress/#include-inline-scripts'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_defer', 
        array(
            'id' => 'defer_inline',
            'section' => 'assets',
            'tooltip' => __('Include inline scripts in deferral.', 'perfmatters'),
            'class' => 'assets-defer_js' . (empty($perfmatters_options['assets']['defer_js']) ? ' hidden' : '')
        )
    );

    //defer jquery
    add_settings_field(
        'defer_jquery', 
        perfmatters_title(__('Include jQuery', 'perfmatters'), 'defer_jquery', 'https://perfmatters.io/docs/defer-javascript-wordpress/#include-jquery'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_defer', 
        array(
            'id' => 'defer_jquery',
            'section' => 'assets',
            'confirmation' => __('Many plugins and themes require jQuery. We recommend either testing jQuery deferral separately or leaving this option turned off.', 'perfmatters'),
            'tooltip' => __('Allow jQuery core to be deferred. We recommend testing this separately or leaving it off.', 'perfmatters'),
            'class' => 'assets-defer_js' . (empty($perfmatters_options['assets']['defer_js']) ? ' hidden' : '') . ' pm-advanced-option'
        )
    );

    //js exlusions
    add_settings_field(
        'js_exclusions', 
        perfmatters_title(__('Excluded from Deferral', 'perfmatters'), 'js_exclusions', 'https://perfmatters.io/docs/defer-javascript-wordpress/#exclude'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_defer', 
        array(
            'id' => 'js_exclusions',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.js',
            'tooltip' => __('Exclude specific JavaScript files from deferral. Exclude a file by adding the source URL (example.js). Format: one per line', 'perfmatters'),
            'class' => 'assets-defer_js' . (empty($perfmatters_options['assets']['defer_js']) ? ' hidden' : '')
        )
    );

    //delay js
    add_settings_section('assets_js_delay', __('Delay', 'perfmatters'), '__return_false', 'perfmatters_options');

    //delay_js
    add_settings_field(
        'delay_js', 
        perfmatters_title(__('Delay JavaScript', 'perfmatters'), 'delay_js', 'https://perfmatters.io/docs/delay-javascript/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_js',
            'section' => 'assets',
            'tooltip' => __('Delay JavaScript from loading until user interaction.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //delayed js behavior
    add_settings_field(
        'delay_js_behavior', 
        perfmatters_title(__('Delay Behavior', 'perfmatters'), 'delay_js_behavior', 'https://perfmatters.io/docs/delay-javascript/#behavior'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_js_behavior',
            'section' => 'assets',
            'input' => 'select',
            'options' => array(
                '' => __('Only Delay Specified Scripts', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                'all' => __('Delay All Scripts', 'perfmatters')
            ),
            'tooltip' => __('Choose the method used to delay scripts.', 'perfmatters'),
            'class' => 'assets-delay_js perfmatters-input-controller' . (empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : '')
        )
    );

    //delay js inclusions
    add_settings_field(
        'delay_js_inclusions', 
        perfmatters_title(__('Delayed Scripts', 'perfmatters'), 'delay_js_inclusions', 'https://perfmatters.io/docs/delay-javascript/#scripts'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_js_inclusions',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.js',
            'tooltip' => __('Delay specific JavaScript files by adding the source URL (example.js), or delay an inline script by adding a unique string from that script. Format: one per line', 'perfmatters'),
            'class' => 'assets-delay_js assets-delay_js_behavior perfmatters-select-control-' . (!empty($perfmatters_options['assets']['delay_js_behavior']) || empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : '')
        )
    );

    //delay js quick exclusions
    add_settings_field(
        'delay_js_quick_exclusions', 
        perfmatters_title(__('Quick Exclusions', 'perfmatters'), 'delay_js_quick_exclusions', 'https://perfmatters.io/docs/delay-javascript/#quick-exclusions'), 
        'perfmatters_print_quick_exclusions', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_js_quick_exclusions',
            'section' => 'assets',
            'tooltip' => __('Exclude scripts for popular plugins and themes based on our predefined lists of common exclusions.', 'perfmatters'),
            'class' => 'assets-delay_js assets-delay_js_behavior perfmatters-select-control-all' . (empty($perfmatters_options['assets']['delay_js_behavior'])  || empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : '') . ' delay_js_quick_exclusions'
        )
    );

    //delay js exclusions
    add_settings_field(
        'delay_js_exclusions', 
        perfmatters_title(__('Excluded from Delay', 'perfmatters'), 'delay_js_exclusions', 'https://perfmatters.io/docs/delay-javascript/#excluded'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_js_exclusions',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.js',
            'tooltip' => __('Exclude specific JavaScript files from delay by adding the source URL (example.js), or exclude an inline script by adding a unique string from that script. Format: one per line', 'perfmatters'),
            'class' => 'assets-delay_js assets-delay_js_behavior perfmatters-select-control-all' . (empty($perfmatters_options['assets']['delay_js_behavior'])  || empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : '')
        )
    );

    //delay timeout
    add_settings_field(
        'delay_timeout', 
        perfmatters_title(__('Delay Timeout', 'perfmatters'), 'delay_timeout', 'https://perfmatters.io/docs/delay-javascript/#timeout'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'delay_timeout',
            'section' => 'assets',
            'tooltip' => __('Load delayed scripts after a set amount of time if no user interaction has been detected.', 'perfmatters'),
            'class' => 'assets-delay_js' . (empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : '')
        )
    );

    //disable click delay
    add_settings_field(
        'disable_click_delay', 
        perfmatters_title(__('Disable Click Delay', 'perfmatters'), 'disable_click_delay', 'https://perfmatters.io/docs/delay-javascript/#disable-click-delay'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'disable_click_delay',
            'section' => 'assets',
            'tooltip' => __('Prevents the first click from being delayed until JavaScript has finished loading. This can be helpful if you are excluding scripts for interactive elements manually.', 'perfmatters'),
            'class' => 'assets-delay_js' . (empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : ''). ' pm-advanced-option'
        )
    );

    //fastclick
    add_settings_field(
        'fastclick', 
        perfmatters_title(__('Enable FastClick', 'perfmatters'), 'fastclick', 'https://perfmatters.io/docs/delay-javascript/#fastclick'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_delay', 
        array(
            'id' => 'fastclick',
            'section' => 'assets',
            'tooltip' => __('Load the FastClick library locally to fix the double-click issue on iOS.', 'perfmatters'),
            'class' => 'assets-delay_js' . (empty($perfmatters_options['assets']['delay_js']) ? ' hidden' : ''). ' pm-advanced-option'
        )
    );

    //minify js
    add_settings_section('assets_js_minify', __('Minify', 'perfmatters'), '__return_false', 'perfmatters_options');

    //minify js
    add_settings_field(
        'minify_js', 
        perfmatters_title(__('Minify JavaScript', 'perfmatters'), 'minify_js', 'https://perfmatters.io/docs/minify-javascript-wordpress/#minify'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_minify', 
        array(
            'id' => 'minify_js',
            'section' => 'assets',
            'tooltip' => __('Remove unnecessary characters and optimize JavaScript files.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //minify js exclusions
    add_settings_field(
        'minify_js_exclusions', 
        perfmatters_title(__('Excluded from Minification', 'perfmatters'), 'minify_js_exclusions', 'https://perfmatters.io/docs/minify-javascript-wordpress/#exclude'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_js_minify', 
        array(
            'id' => 'minify_js_exclusions',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.js',
            'tooltip' => __('Exclude specific JavaScript files from minification by adding the source URL (example.js). Format: one per line', 'perfmatters'),
            'class' => 'assets-minify_js' . (empty($perfmatters_options['assets']['minify_js']) ? ' hidden' : '')
        )
    );

    //clear minified js
    add_settings_field(
        'clear_minified_js', 
        perfmatters_title(__('Clear Minified JS', 'perfmatters'), 'clear_minified_js', 'https://perfmatters.io/docs/minify-javascript-wordpress/#clear'), 
        'perfmatters_print_input',
        'perfmatters_options', 
        'assets_js_minify', 
        array(
            'section' => 'assets',
            'id' => 'clear_minified_js',
            'input' => 'button',
            'action' => 'clear_minified_js',
            'title' => __('Clear Minified JS', 'perfmatters'),
            'class' => 'assets-minify_js' . (empty($perfmatters_options['assets']['minify_js']) ? ' hidden' : ''),
            'tooltip' => __('Remove all existing minified JavaScript files that have been generated.', 'perfmatters')
        )
    );

    //assets css section
    add_settings_section('assets_css', __('Unused', 'perfmatters'), '__return_false', 'perfmatters_options');

    //remove unused css
    add_settings_field(
        'remove_unused_css', 
        perfmatters_title(__('Remove Unused CSS', 'perfmatters'), 'remove_unused_css', 'https://perfmatters.io/docs/remove-unused-css/#remove-unused-css'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'remove_unused_css',
            'section' => 'assets',
            'tooltip' => __('Remove unused CSS from your stylesheets and print out used CSS inline in the header.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //used css method
    add_settings_field(
        'rucss_method', 
        perfmatters_title(__('Used CSS Method', 'perfmatters'), 'rucss_method', 'https://perfmatters.io/docs/remove-unused-css/#css-method'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'rucss_method',
            'section' => 'assets',
            'input' => 'select',
            'options' => array(
                '' => __('Inline', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                'file' => __('File', 'perfmatters')
            ),
            'tooltip' => __('Choose how the used CSS will be included.', 'perfmatters'),
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : '')
        )
    );

    //unused css stylesheet behavior
    add_settings_field(
        'rucss_stylesheet_behavior', 
        perfmatters_title(__('Stylesheet Behavior', 'perfmatters'), 'rucss_stylesheet_behavior', 'https://perfmatters.io/docs/remove-unused-css/#stylesheet-behavior'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'rucss_stylesheet_behavior',
            'section' => 'assets',
            'input' => 'select',
            'options' => array(
                '' => __('Delay', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                'async' => __('Async', 'perfmatters'),
                'remove' => __('Remove', 'perfmatters')
            ),
            'tooltip' => __('Choose how the original stylesheets (unused CSS) will be included.', 'perfmatters'),
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : '')
        )
    );

    //remove unused css excluded stylesheets
    add_settings_field(
        'rucss_excluded_stylesheets', 
        perfmatters_title(__('Excluded Stylesheets', 'perfmatters'), 'rucss_excluded_stylesheets', 'https://perfmatters.io/docs/remove-unused-css/#excluded-stylesheets'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'rucss_excluded_stylesheets',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'tooltip' => __('Exclude specific stylesheets from unused CSS removal by adding a unique portion of the source URL (example.css). Format: one per line', 'perfmatters'),
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : '')
        )
    );

    //remove unused css excluded selectors
    add_settings_field(
        'rucss_excluded_selectors', 
        perfmatters_title(__('Excluded Selectors', 'perfmatters'), 'rucss_excluded_selectors', 'https://perfmatters.io/docs/remove-unused-css/#excluded-selectors'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'rucss_excluded_selectors',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'tooltip' => __('Exclude specific CSS selectors from being removed by adding the element ID, class name, etc. (#id, .class). Format: one per line', 'perfmatters'),
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : '')
        )
    );

    //cdn url
    add_settings_field(
        'rucss_cdn_url', 
        perfmatters_title(__('CDN URL', 'perfmatters'), 'rucss_cdn_url', 'https://perfmatters.io/docs/remove-unused-css/#cdn-url'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css', 
        array(
            'id' => 'rucss_cdn_url',
            'section' => 'assets',
            'input' => 'text',
            'tooltip' => __('Provide your CDN URL if you are using a CDN rewrite outside of Perfmatters.', 'perfmatters'),
            'placeholder' => 'https://cdn.example.com',
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : ''). ' pm-advanced-option'
        )
    );

    //clear used css
    add_settings_field(
        'clear_used_css', 
        perfmatters_title(__('Clear Used CSS', 'perfmatters'), 'clear_used_css', 'https://perfmatters.io/docs/remove-unused-css/#clear-used-css'), 
        'perfmatters_print_input',
        'perfmatters_options', 
        'assets_css', 
        array(
            'section' => 'assets',
            'id' => 'clear_used_css',
            'input' => 'button',
            'action' => 'clear_used_css',
            'title' => __('Clear Used CSS', 'perfmatters'),
            'class' => 'assets-remove_unused_css' . (empty($perfmatters_options['assets']['remove_unused_css']) ? ' hidden' : ''),
            'tooltip' => __('Remove all existing unused CSS files that have been generated.', 'perfmatters')
        )
    );

    //minify css
    add_settings_section('assets_css_minify', __('Minify', 'perfmatters'), '__return_false', 'perfmatters_options');

    //minify css
    add_settings_field(
        'minify_css', 
        perfmatters_title(__('Minify CSS', 'perfmatters'), 'minify_css', 'https://perfmatters.io/docs/minify-css-wordpress/#minify'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css_minify', 
        array(
            'id' => 'minify_css',
            'section' => 'assets',
            'tooltip' => __('Remove unnecessary characters and optimize CSS files.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //minify css exclusions
    add_settings_field(
        'minify_css_exclusions', 
        perfmatters_title(__('Excluded from Minification', 'perfmatters'), 'minify_css_exclusions', 'https://perfmatters.io/docs/minify-css-wordpress/#exclude'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_css_minify', 
        array(
            'id' => 'minify_css_exclusions',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.css',
            'tooltip' => __('Exclude specific CSS files from minification by adding the source URL (example.css). Format: one per line', 'perfmatters'),
            'class' => 'assets-minify_css' . (empty($perfmatters_options['assets']['minify_css']) ? ' hidden' : '')
        )
    );

    //clear minified css
    add_settings_field(
        'clear_minified_css', 
        perfmatters_title(__('Clear Minified CSS', 'perfmatters'), 'clear_minified_css', 'https://perfmatters.io/docs/minify-css-wordpress/#clear'), 
        'perfmatters_print_input',
        'perfmatters_options', 
        'assets_css_minify', 
        array(
            'section' => 'assets',
            'id' => 'clear_minified_css',
            'input' => 'button',
            'action' => 'clear_minified_css',
            'title' => __('Clear Minified CSS', 'perfmatters'),
            'class' => 'assets-minify_css' . (empty($perfmatters_options['assets']['minify_css']) ? ' hidden' : ''),
            'tooltip' => __('Remove all existing minified CSS files that have been generated.', 'perfmatters')
        )
    );

    //assets code section
    add_settings_section('assets_code', '', '__return_false', 'perfmatters_options');

    //header code
    add_settings_field(
        'header_code', 
        perfmatters_title(__('Add Header Code', 'perfmatters'), 'header_code', 'https://perfmatters.io/docs/wordpress-add-code-to-header-footer/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_code', 
        array(
            'id' => 'header_code',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'codemirror',
            'tooltip' => __('Code added here will be printed in the head section on every page of your website.', 'perfmatters')
        )
    );

    //body code
    if(function_exists('wp_body_open') && version_compare(get_bloginfo('version'), '5.2' , '>=')) {

        add_settings_field(
            'body_code', 
            perfmatters_title(__('Add Body Code', 'perfmatters'), 'body_code', 'https://perfmatters.io/docs/wordpress-add-code-to-header-footer/'), 
            'perfmatters_print_input', 
            'perfmatters_options', 
            'assets_code', 
            array(
                'id' => 'body_code',
                'section' => 'assets',
                'input' => 'textarea',
                'textareatype' => 'codemirror',
                'tooltip' => __('Code added here will be printed below the opening body tag on every page of your website.', 'perfmatters')
            )
        );
    }

    //footer code
    add_settings_field(
        'footer_code', 
        perfmatters_title(__('Add Footer Code', 'perfmatters'), 'footer_code', 'https://perfmatters.io/docs/wordpress-add-code-to-header-footer/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'assets_code', 
        array(
            'id' => 'footer_code',
            'section' => 'assets',
            'input' => 'textarea',
            'textareatype' => 'codemirror',
            'tooltip' => __('Code added here will be printed above the closing body tag on every page of your website.', 'perfmatters')
        )
    );

    /* preload section
    /**********************************************************/
    add_settings_section('preload', '', '__return_false', 'perfmatters_options');

    //enable instant page
    add_settings_field(
        'instant_page', 
        perfmatters_title(__('Enable Instant Page', 'perfmatters'), 'instant_page', 'https://perfmatters.io/docs/link-prefetch/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'instant_page',
            'section' => 'preload',
            'tooltip' => __('Automatically prefetch URLs in the background after a user hovers over a link. This results in almost instantaneous load times and improves the user experience.', 'perfmatters')
        )
    );

    //preload critical images
    add_settings_field(
        'critical_images', 
        perfmatters_title(__('Preload Critical Images', 'perfmatters'), 'critical_images', 'https://perfmatters.io/docs/preload/#critical-images'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'critical_images',
            'section' => 'preload',
            'input' => 'select',
            'options' => array(
                '' => '0' . ' (' . __('Default', 'perfmatters') . ')',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5'
            ),
            'tooltip' => __('Automatically preload leading images to help improve Largest Contentful Paint (LCP).', 'perfmatters')
        )
    );

    //preload
    add_settings_field(
        'preload', 
        perfmatters_title(__('Preload', 'perfmatters'), 'preload', 'https://perfmatters.io/docs/preload/'), 
        'perfmatters_print_input_rows', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'preload',
            'section' => 'preload',
            'tooltip' => __('Preload allows you to specify resources (such as fonts or CSS) needed right away during a page load. This helps fix render-blocking resource warnings. Format: https://example.com/font.woff2', 'perfmatters')
        )
    );

    //fetch priority
    add_settings_field(
        'fetch_priority', 
        perfmatters_title(__('Fetch Priority', 'perfmatters'), 'fetch_priority', 'https://perfmatters.io/docs/fetch-priority/'), 
        'perfmatters_print_input_rows', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'fetch_priority',
            'section' => 'preload',
            'tooltip' => __('Add the fetchpriority HTML attribute to a resource to proritize it higher or lower. This can help improve Largest Contentful Paint (LCP).', 'perfmatters')
        )
    );

    //disable core fetch
    add_settings_field(
        'disable_core_fetch', 
        perfmatters_title(__('Disable Core Fetch', 'perfmatters'), 'disable_core_fetch', 'https://perfmatters.io/docs/fetch-priority/#disable-core'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'disable_core_fetch',
            'section' => 'preload',
            'tooltip' => __('Disable the fetch priority attribute added by WordPress core.', 'perfmatters'),
            'class' => 'pm-advanced-option'
        )
    );

    //preconnect
    add_settings_field(
        'preconnect', 
        perfmatters_title(__('Preconnect', 'perfmatters'), 'preconnect', 'https://perfmatters.io/docs/preconnect/'), 
        'perfmatters_print_input_rows', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'preconnect',
            'section' => 'preload',
            'tooltip' => __('Preconnect allows the browser to set up early connections before an HTTP request, eliminating roundtrip latency and saving time for users. Format: https://example.com', 'perfmatters')
        )
    );

    //dns prefetch
    add_settings_field(
        'dns_prefetch', 
        perfmatters_title(__('DNS Prefetch', 'perfmatters'), 'dns_prefetch', 'https://perfmatters.io/docs/dns-prefetching/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'preload', 
        array(
            'id' => 'dns_prefetch',
            'section' => 'preload',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => '//example.com',
            'tooltip' => __('Resolve domain names before a user clicks. Format: //example.com (one per line)', 'perfmatters')
        )
    );

    /* lazyload section
    /**********************************************************/
    add_settings_section('lazyload', '', '__return_false', 'perfmatters_options');

    //images
    add_settings_field(
        'lazy_loading', 
        perfmatters_title(__('Images', 'perfmatters'), 'lazy_loading', 'https://perfmatters.io/docs/lazy-load-wordpress/#images'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'lazy_loading',
            'tooltip' => __('Enable lazy loading on images.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //exclude leading
    add_settings_field(
        'exclude_leading_images', 
        perfmatters_title(__('Exclude Leading Images', 'perfmatters'), 'exclude_leading_images', 'https://perfmatters.io/docs/lazy-load-wordpress/#exclude-leading-images'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'exclude_leading_images',
            'input' => 'select',
            'options' => array(
                '' => '0' . ' (' . __('Default', 'perfmatters') . ')',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5'
            ),
            'tooltip' => __('Exclude a certain number of images starting from the top of the page.', 'perfmatters'),
            'class' => 'lazyload-lazy_loading' . (empty($perfmatters_options['lazyload']['lazy_loading']) ? ' hidden' : '')
        )
    );

    //iframes and videos
    add_settings_field(
        'lazy_loading_iframes', 
        perfmatters_title(__('iFrames and Videos', 'perfmatters'), 'lazy_loading_iframes', 'https://perfmatters.io/docs/lazy-load-wordpress/#iframes-videos'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'lazy_loading_iframes',
            'tooltip' => __('Enable lazy loading on iframes and videos.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //youtube preview thumbnails
    add_settings_field(
        'youtube_preview_thumbnails', 
        perfmatters_title(__('YouTube Preview Thumbnails', 'perfmatters'), 'youtube_preview_thumbnails', 'https://perfmatters.io/docs/lazy-load-wordpress/#youtube-preview-thumbnails'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'youtube_preview_thumbnails',
            'tooltip' => __('Swap out YouTube iFrames with preview thumbnails. The original iFrame is loaded when the thumbnail is clicked.', 'perfmatters'),
            'class' => 'lazyload-lazy_loading_iframes' . (empty($perfmatters_options['lazyload']['lazy_loading_iframes']) ? ' hidden' : '')
        )
    );

    //lazy load exclusions
    add_settings_field(
        'lazy_loading_exclusions', 
        perfmatters_title(__('Exclude from Lazy Loading', 'perfmatters'), 'lazy_loading_exclusions', 'https://perfmatters.io/docs/lazy-load-wordpress/#exclude'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'lazy_loading_exclusions',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example.png',
            'tooltip' => __('Exclude specific elements from lazy loading. Exclude an element by adding the source URL (example.png) or by adding any unique portion of its attribute string (class="example"). Format: one per line', 'perfmatters')
        )
    );

    //lazy load parent exclusions
    add_settings_field(
        'lazy_loading_parent_exclusions', 
        perfmatters_title(__('Exclude by Parent Selector', 'perfmatters'), 'lazy_loading_parent_exclusions', 'https://perfmatters.io/docs/lazy-load-wordpress/#exclude-parent-selector'),
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'lazy_loading_parent_exclusions',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'example-div-class',
            'tooltip' => __('Exclude specific images from lazy loading by adding any unique portion of an attribute string (class="example") from a parent container. Format: one per line', 'perfmatters'),
            'class' => 'pm-advanced-option'
        )
    );

    //threshold
    add_settings_field(
        'threshold', 
        perfmatters_title(__('Threshold', 'perfmatters'), 'threshold', 'https://perfmatters.io/docs/lazy-load-wordpress/#threshold'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'threshold',
            'input' => 'text',
            'validate' => '[0-9.pPxX%]',
            'placeholder' => '0px',
            'tooltip' => __('Extend the lazy loading threshold allowing images to load before they are visible in the viewport. (px or %)', 'perfmatters')
        )
    );

    //DOM monitoring
    add_settings_field(
        'lazy_loading_dom_monitoring', 
        perfmatters_title(__('DOM Monitoring', 'perfmatters'), 'lazy_loading_dom_monitoring', 'https://perfmatters.io/docs/lazy-load-wordpress/#dom-monitoring'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'lazy_loading_dom_monitoring',
            'tooltip' => __('Watch for changes in the DOM and dynamically lazy load newly added elements.', 'perfmatters')
        )
    );

    //image dimensions
    add_settings_field(
        'image_dimensions', 
        perfmatters_title(__('Add Missing Image Dimensions', 'perfmatters'), 'image_dimensions', 'https://perfmatters.io/docs/missing-width-height-images/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'image_dimensions',
            'tooltip' => __('Add missing width and height attributes to images.', 'perfmatters')
        )
    );

    //fade in
    add_settings_field(
        'fade_in', 
        perfmatters_title(__('Fade In', 'perfmatters'), 'fade_in', 'https://perfmatters.io/docs/lazy-load-wordpress/#fade-in'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'fade_in',
            'tooltip' => __('Add fade in effect when images are loaded in.', 'perfmatters')
        )
    );

    //css background images
    add_settings_field(
        'css_background_images', 
        perfmatters_title(__('CSS Background Images', 'perfmatters'), 'css_background_images', 'https://perfmatters.io/docs/lazy-load-wordpress/#css-background-images'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'css_background_images',
            'tooltip' => __('Allow lazy loading of background images coming from (CSS) stylesheets.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //css background selectors
    add_settings_field(
        'css_background_selectors', 
        perfmatters_title(__('Background Selectors', 'perfmatters'), 'css_background_selectors', 'https://perfmatters.io/docs/lazy-load-wordpress/#css-background-images'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload', 
        array(
            'section' => 'lazyload',
            'id' => 'css_background_selectors',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'div-background-class',
            'tooltip' => __('Lazy load a CSS background image by adding a unique selector (ID or class) found on the element that the background image has been applied to. Format: one per line', 'perfmatters'),
            'class' => 'lazyload-css_background_images' . (empty($perfmatters_options['lazyload']['css_background_images']) ? ' hidden' : '')
        )
    );

    //lazy elements
    add_settings_section('lazyload_elements', __('Lazy Elements', 'perfmatters'), '__return_false', 'perfmatters_options');

    //elements
    add_settings_field(
        'elements', 
        perfmatters_title(__('Elements', 'perfmatters') . '<span class="perfmatters-beta">BETA</span>', 'elements', 'https://perfmatters.io/docs/lazy-load-elements/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload_elements', 
        array(
            'section' => 'lazyload',
            'id' => 'elements',
            'tooltip' => __('Allow lazy loading of elements in the DOM.', 'perfmatters'),
            'class' => 'perfmatters-input-controller'
        )
    );

    //element selectors
    add_settings_field(
        'element_selectors', 
        perfmatters_title(__('Element Selectors', 'perfmatters'), 'element_selectors', 'https://perfmatters.io/docs/lazy-load-elements/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'lazyload_elements', 
        array(
            'section' => 'lazyload',
            'id' => 'element_selectors',
            'input' => 'textarea',
            'textareatype' => 'oneperline',
            'placeholder' => 'div-background-class',
            'tooltip' => __('Lazy load specific elements and their descendants by adding any unique portion of an attribute string (class="example") from a parent container. Format: one per line', 'perfmatters'),
            'class' => 'lazyload-elements' . (empty($perfmatters_options['lazyload']['elements']) ? ' hidden' : '')
        )
    );

    /* fonts section
    /**********************************************************/
    add_settings_section('perfmatters_fonts', '', '__return_false', 'perfmatters_options');

    //local google fonts
    add_settings_field(
        'local_google_fonts', 
        perfmatters_title(__('Local Google Fonts', 'perfmatters'), 'local_google_fonts', 'https://perfmatters.io/docs/host-google-fonts-locally/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'local_google_fonts',
            'class' => 'perfmatters-input-controller fonts-disable_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) ? ' hidden' : ''),
            'tooltip' => __('Host Google Font files locally on your server or CDN.', 'perfmatters')
        )
    );

    //display swap
    add_settings_field(
        'display_swap', 
        perfmatters_title(__('Display Swap', 'perfmatters'), 'display_swap', 'https://perfmatters.io/docs/font-display-swap/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'display_swap',
            'class' => 'fonts-disable_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) ? ' hidden' : ''),
            'tooltip' => __('Add the font-display swap property to your Google Fonts.', 'perfmatters')
        )
    );

    //method
    add_settings_field(
        'method', 
        perfmatters_title(__('Print Method', 'perfmatters'), 'method', 'https://perfmatters.io/docs/host-google-fonts-locally/#print-method'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'method',
            'class' => 'fonts-disable_google_fonts fonts-local_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) || empty($perfmatters_options['fonts']['local_google_fonts']) ? ' hidden' : ''),
            'input' => 'select',
            'options' => array(
                '' => __('File', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                'inline' => __('Inline', 'perfmatters')
            ),
            'tooltip' => __('Choose how the local font stylesheet will be included.', 'perfmatters')
        )
    );

    //limit subsets
    add_settings_field(
        'limit_subsets', 
        perfmatters_title(__('Limit Subsets', 'perfmatters'), 'limit_subsets', 'https://perfmatters.io/docs/limit-google-fonts-subsets/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'limit_subsets',
            'class' => 'perfmatters-input-controller fonts-disable_google_fonts fonts-local_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) || empty($perfmatters_options['fonts']['local_google_fonts']) ? ' hidden' : ''),
            'tooltip' => __('Limit subsets that are downloaded and included in the stylesheet.', 'perfmatters')
        )
    );

    //subsets
    add_settings_field(
        'subsets', 
        perfmatters_title(__('Allowed Subsets', 'perfmatters'), 'subsets', 'https://perfmatters.io/docs/limit-google-fonts-subsets/'), 
        'perfmatters_print_subsets', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'subsets',
            'class' => 'fonts-disable_google_fonts fonts-local_google_fonts fonts-limit_subsets' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) || empty($perfmatters_options['fonts']['local_google_fonts']) || empty($perfmatters_options['fonts']['limit_subsets']) ? ' hidden' : ''),
            'tooltip' => __('Choose which subsets to download locally.', 'perfmatters')
        )
    );

    //cdn url
    add_settings_field(
        'cdn_url', 
        perfmatters_title(__('CDN URL', 'perfmatters'), 'cdn_url', 'https://perfmatters.io/docs/host-google-fonts-locally/#cdn'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'cdn_url',
            'input' => 'text',
            'class' => 'fonts-disable_google_fonts fonts-local_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) || empty($perfmatters_options['fonts']['local_google_fonts']) ? ' hidden' : ''),
            'placeholder' => 'https://cdn.example.com',
            'tooltip' => __('Use your CDN URL when referencing Google Font files inside a parent stylesheet. Example: https://cdn.example.com', 'perfmatters')
        )
    );

    //clear fonts
    add_settings_field(
        'clear_fonts', 
        perfmatters_title(__('Clear Local Fonts', 'perfmatters'), 'clear_fonts', 'https://perfmatters.io/docs/host-google-fonts-locally/#clear-local-fonts'), 
        'perfmatters_print_input',
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'clear_fonts',
            'input' => 'button',
            'action' => 'clear_local_fonts',
            'title' => __('Clear Local Fonts', 'perfmatters'),
            'class' => 'fonts-disable_google_fonts fonts-local_google_fonts' . (!empty($perfmatters_options['fonts']['disable_google_fonts']) || empty($perfmatters_options['fonts']['local_google_fonts']) ? ' hidden' : ''),
            'tooltip' => __('Remove all existing local Google Font files and stylesheets.', 'perfmatters')
        )
    );

    //disable google fonts
    add_settings_field(
        'disable_google_fonts', 
        perfmatters_title(__('Disable Google Fonts', 'perfmatters'), 'disable_google_fonts', 'https://perfmatters.io/docs/disable-google-fonts/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_fonts', 
        array(
            'section' => 'fonts',
            'id' => 'disable_google_fonts',
            'class' => 'perfmatters-input-controller',
            'tooltip' => __('Removes any instances of Google Fonts being loaded across your entire site.', 'perfmatters')
        )
    );

    /* cdn section
    /**********************************************************/
    add_settings_section('perfmatters_cdn', '', '__return_false', 'perfmatters_options');

    //enable cdn rewrite
    add_settings_field(
        'enable_cdn', 
        perfmatters_title(__('Enable CDN Rewrite', 'perfmatters'), 'enable_cdn', 'https://perfmatters.io/docs/cdn-rewrite/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_cdn', 
        array(
            'section' => 'cdn',
            'id' => 'enable_cdn',
            'tooltip' => __('Enables rewriting of your site URLs with your CDN URLs which can be configured below.', 'perfmatters')
        )
    );

    //cdn url
    add_settings_field(
        'cdn_url', 
        perfmatters_title(__('CDN URL', 'perfmatters'), 'cdn_url', 'https://perfmatters.io/docs/cdn-url/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_cdn', 
        array(
            'section' => 'cdn',
            'id' => 'cdn_url',
            'input' => 'text',
            'placeholder' => 'https://cdn.example.com',
            'tooltip' => __('Enter your CDN URL without the trailing backslash. Example: https://cdn.example.com', 'perfmatters')
        )
    );

    //cdn included directories
    add_settings_field(
        'cdn_directories', 
        perfmatters_title(__('Included Directories', 'perfmatters'), 'cdn_directories', 'https://perfmatters.io/docs/cdn-included-directories/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_cdn', 
        array(
            'section' => 'cdn',
            'id' => 'cdn_directories',
            'input' => 'text',
            'placeholder' => 'wp-content,wp-includes',
            'tooltip' => __('Enter any directories you would like to be included in CDN rewriting, separated by commas (,). Default: wp-content,wp-includes', 'perfmatters')
        )
    );

    //cdn exclusions
    add_settings_field(
        'cdn_exclusions', 
        perfmatters_title(__('CDN Exclusions', 'perfmatters'), 'cdn_exclusions', 'https://perfmatters.io/docs/cdn-exclusions/'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_cdn', 
        array(
            'section' => 'cdn',
            'id' => 'cdn_exclusions',
            'input' => 'text',
            'placeholder' => '.php',
            'tooltip' => __('Enter any directories or file extensions you would like to be excluded from CDN rewriting, separated by commas (,). Default: .php', 'perfmatters')
        )
    );

    /* analytics section
    /**********************************************************/
    add_settings_section('perfmatters_analytics', '', '__return_false', 'perfmatters_options');

    //enable local ga
    add_settings_field(
        'enable_local_ga', 
        perfmatters_title(__('Enable Local Analytics', 'perfmatters'), 'enable_local_ga', 'https://perfmatters.io/docs/local-analytics/'),
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'enable_local_ga',
            'tooltip' => __('Enable syncing of the Google Analytics script to your own server.', 'perfmatters')
        )
    );

    //google analytics id
    add_settings_field(
        'tracking_id', 
        perfmatters_title(__('Tracking ID', 'perfmatters'), 'tracking_id', 'https://perfmatters.io/docs/local-analytics/#trackingid'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'tracking_id',
            'input' => 'text',
            'tooltip' => __('Input your Google Analytics tracking or measurement ID.', 'perfmatters')
        )
    );

    //tracking code position
    add_settings_field(
        'tracking_code_position', 
        perfmatters_title(__('Tracking Code Position', 'perfmatters'), 'tracking_code_position', 'https://perfmatters.io/docs/local-analytics/#trackingcodeposition'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'tracking_code_position',
            'input' => 'select',
            'options' => array(
                "" => __('Header', 'perfmatters') . ' (' . __('Default', 'perfmatters') . ')',
                "footer" => __('Footer', 'perfmatters')
                ),
            'tooltip' => __('Load your analytics script in the header (default) or footer of your site. Default: Header', 'perfmatters')
        )
    );

    //script type
    add_settings_field(
        'script_type', 
        perfmatters_title(__('Script Type', 'perfmatters'), 'tracking_code_position', 'https://perfmatters.io/docs/local-analytics/#script-type'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'script_type',
            'input' => 'select',
            'options' => array(
                '' => 'Google Analytics 4' . ' (' . __('Default', 'perfmatters') . ')',
                'minimalv4' => 'Google Analytics 4 Minimal'
            ),
            'class' => 'perfmatters-input-controller',
            'tooltip' => __('Choose which script method you would like to use. Default Google Analytics 4 is larger and includes all features, while Minimal is smaller and only includes basic reporting features.', 'perfmatters')
        )
    );

    //track logged in admins
    add_settings_field(
        'track_admins', 
        perfmatters_title(__('Track Logged In Admins', 'perfmatters'), 'track_admins', 'https://perfmatters.io/docs/local-analytics/#track-logged-in-admins'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'track_admins',
            'tooltip' => __('Include logged-in WordPress admins in your Google Analytics reports.', 'perfmatters')
        )
    );

    //use monsterinsights
    add_settings_field(
        'use_monster_insights', 
        perfmatters_title(__('Use MonsterInsights', 'perfmatters'), 'use_monster_insights', 'https://perfmatters.io/docs/local-analytics/#monster-insights'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'use_monster_insights',
            'class' => 'analytics-script_type perfmatters-select-control- ' . (!empty($perfmatters_options['analytics']['script_type']) ? ' hidden' : ''),
            'tooltip' => __('Allows MonsterInsights to manage your Google Analytics while still using the locally hosted gtag.js file generated by Perfmatters.', 'perfmatters')
        )
    );

    //enable amp support
    add_settings_field(
        'enable_amp', 
        perfmatters_title(__('Enable AMP Support', 'perfmatters'), 'enable_amp', 'https://perfmatters.io/docs/local-analytics/#amp'), 
        'perfmatters_print_input', 
        'perfmatters_options', 
        'perfmatters_analytics', 
        array(
            'section' => 'analytics',
            'id' => 'enable_amp',
            'tooltip' => __('Enable support for analytics tracking on AMP sites. This is not a local script, but a native AMP script.', 'perfmatters')
        )
    );

    register_setting('perfmatters_options', 'perfmatters_options', 'perfmatters_sanitize_options');

    //tools plugin section
    add_settings_section('plugin', __('Plugin', 'perfmatters'), '__return_false', 'perfmatters_tools');

    //script manager
    add_settings_field(
        'script_manager', 
        perfmatters_title(__('Script Manager', 'perfmatters'), 'script_manager', 'https://perfmatters.io/docs/disable-scripts-per-post-page/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'plugin', 
        array(
            'id' => 'script_manager',
            'option' => 'perfmatters_tools',
            'tooltip' => __('Enables the Perfmatters Script Manager, which gives you the ability to disable CSS and JS files on a page by page basis.', 'perfmatters')
        )
    );

    //show advanced options
    add_settings_field(
        'show_advanced', 
        perfmatters_title(__('Show Advanced Options', 'perfmatters'), 'show_advanced', 'https://perfmatters.io/docs/advanced-options/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'plugin', 
        array(
            'id' => 'show_advanced',
            'option' => 'perfmatters_tools',
            'tooltip' => __('Show advanced options in the Perfmatters UI.', 'perfmatters'),
            'confirmation' => __('Advanced options should only be used if you know exactly what you are doing, as they can break certain plugin functionality if used improperly.', 'perfmatters'),
        )
    );

    //disable while logged in
    add_settings_field(
        'disable_logged_in', 
        perfmatters_title(__('Disable for Logged In Users', 'perfmatters'), 'disable_logged_in', 'https://perfmatters.io/docs/disable-logged-in-users/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'plugin', 
        array(
            'id' => 'disable_logged_in',
            'option' => 'perfmatters_tools',
            'tooltip' => __('Disable optimizations for logged in users.', 'perfmatters')
        )
    );

    //hide admin bar menu
    add_settings_field(
        'hide_admin_bar_menu', 
        perfmatters_title(__('Hide Admin Bar Menu', 'perfmatters'), 'hide_admin_bar_menu', 'https://perfmatters.io/docs/hide-admin-bar-menu/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'plugin', 
        array(
            'id' => 'hide_admin_bar_menu',
            'option' => 'perfmatters_tools',
            'tooltip' => __('Hide the Perfmatters menu in the admin bar.', 'perfmatters')
        )
    );

    //accessibility mode
    add_settings_field(
        'accessibility_mode', 
        perfmatters_title(__('Accessibility Mode', 'perfmatters'), 'accessibility_mode', 'https://perfmatters.io/docs/accessibility-mode/'), 
        'perfmatters_print_input',
        'perfmatters_tools', 
        'plugin', 
        array(
            'id' => 'accessibility_mode',
            'input' => 'checkbox',
            'option' => 'perfmatters_tools',
            'tooltip' => __('Disable the use of visual UI elements in the plugin settings such as checkbox toggles and hovering tooltips.', 'perfmatters')
        )
    );

    //settings
    add_settings_section('settings', __('Settings', 'perfmatters'), '__return_false', 'perfmatters_tools');

    if(!is_multisite()) {

        //clean uninstall
        add_settings_field(
            'clean_uninstall', 
            perfmatters_title(__('Clean Uninstall', 'perfmatters'), 'clean_uninstall', 'https://perfmatters.io/docs/clean-uninstall/'), 
            'perfmatters_print_input', 
            'perfmatters_tools', 
            'settings', 
            array(
                'id' => 'clean_uninstall',
                'option' => 'perfmatters_tools',
                'tooltip' => __('When enabled, this will cause all Perfmatters options data to be removed from your database when the plugin is uninstalled.', 'perfmatters')
            )
        );
    }

    //restore defaults
    add_settings_field(
        'restore_defaults', 
        perfmatters_title(__('Restore Default Options', 'perfmatters'), 'restore_defaults', 'https://perfmatters.io/docs/restore-default-options/'), 
        'perfmatters_print_input',
        'perfmatters_tools', 
        'settings', 
        array(
            'id'      => 'restore_defaults',
            'input'   => 'button',
            'action'  => 'restore_defaults',
            'title'   => __('Restore Default Options', 'perfmatters'),
            'confirmation' => __('Are you sure? This will remove all existing plugin options and restore them to their default states.', 'perfmatters'),
            'option'  => 'perfmatters_tools',
            'tooltip' => __('Restore all plugin options to their default settings.', 'perfmatters')
        )
    );

    //purge meta options
    add_settings_field(
        'purge_meta', 
        perfmatters_title(__('Purge Meta Options', 'perfmatters'), false, 'https://perfmatters.io/docs/purge-meta-options/'), 
        'perfmatters_print_purge_meta', 
        'perfmatters_tools', 
        'settings', 
        array(
            'id'           => 'purge_meta',
            'input'        => 'button',
            'option'       => 'perfmatters_tools',
            'title'        => __('Purge Meta Options', 'perfmatters'),
            'confirmation' => __('Are you sure? This will delete all existing Perfmatters meta options for all posts from the database.', 'perfmatters'),
            'tooltip'      => __('Permanently delete all existing Perfmatters meta options from your database.', 'perfmatters')
        )
    );

    //export settings
    add_settings_field(
        'export_settings', 
        perfmatters_title(__('Export Settings', 'perfmatters'), 'export_settings', 'https://perfmatters.io/docs/import-export/'), 
        'perfmatters_print_input',
        'perfmatters_tools', 
        'settings', 
        array(
            'id' => 'export_settings',
            'input' => 'button',
            'action' => 'export_settings',
            'title' => __('Export Plugin Settings', 'perfmatters'),
            'option' => 'perfmatters_tools',
            'tooltip' => __('Export your Perfmatters settings for this site as a .json file. This lets you easily import the configuration into another site.', 'perfmatters')
        )
    );

    //import settings
    add_settings_field(
        'import_settings', 
        perfmatters_title(__('Import Settings', 'perfmatters'), 'import_settings', 'https://perfmatters.io/docs/import-export/'), 
        'perfmatters_print_import_settings',
        'perfmatters_tools', 
        'settings', 
        array(
            'tooltip' => __('Import Perfmatters settings from an exported .json file.', 'perfmatters')
        )
    );

    //database section
    add_settings_section('database', '', '__return_false', 'perfmatters_tools');

    //optimize database
    add_settings_field(
        'scan_database', 
        perfmatters_title(__('Scan Database', 'perfmatters'), 'scan_database', 'https://perfmatters.io/docs/optimize-wordpress-database/#scan'), 
        'perfmatters_print_input',
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'scan_database',
            'input' => 'button',
            'action' => 'scan_database',
            'title' => __('Scan Now', 'perfmatters'),
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Scan the database to calculate items available for optimization.', 'perfmatters')
        )
    );

    //post revisions
    add_settings_field(
        'post_revisions', 
        perfmatters_title(__('Post Revisions', 'perfmatters'), 'post_revisions', 'https://perfmatters.io/docs/wordpress-post-revisions/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'post_revisions',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include post revisions in your database optimization. This also includes revisions for pages and custom post types.', 'perfmatters')
        )
    );

    //post auto-drafts
    add_settings_field(
        'post_auto_drafts', 
        perfmatters_title(__('Post Auto-Drafts', 'perfmatters'), 'post_auto_drafts', 'https://perfmatters.io/docs/wordpress-auto-drafts/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'post_auto_drafts',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include post auto-drafts in your database optimization. This also includes auto-drafts for pages and custom post types.', 'perfmatters'),
        )
    );

    //trashed posts
    add_settings_field(
        'trashed_posts', 
        perfmatters_title(__('Trashed Posts', 'perfmatters'), 'trashed_posts', 'https://perfmatters.io/docs/wordpress-trash/#posts'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'trashed_posts',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include trashed posts in your database optimization. This also includes trashed pages and custom post types.', 'perfmatters')
        )
    );

    //spam comments
    add_settings_field(
        'spam_comments', 
        perfmatters_title(__('Spam Comments', 'perfmatters'), 'spam_comments', 'https://perfmatters.io/docs/wordpress-spam-comments/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'spam_comments',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include spam comments in your database optimization.', 'perfmatters')
        )
    );

    //trashed comments
    add_settings_field(
        'trashed_comments', 
        perfmatters_title(__('Trashed Comments', 'perfmatters'), 'trashed_comments', 'https://perfmatters.io/docs/wordpress-trash/#comments'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'trashed_comments',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include trashed comments in your database optimization.', 'perfmatters')
        )
    );

    //expired transients
    add_settings_field(
        'expired_transients', 
        perfmatters_title(__('Expired Transients', 'perfmatters'), 'expired_transients', 'https://perfmatters.io/docs/wordpress-transients/#expired'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'expired_transients',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include expired transients in your database optimization.', 'perfmatters')
        )
    );

    //all transients
    add_settings_field(
        'all_transients', 
        perfmatters_title(__('All Transients', 'perfmatters'), 'all_transients', 'https://perfmatters.io/docs/wordpress-transients/#all'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'all_transients',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include all transients in your database optimization.', 'perfmatters')
        )
    );

    //tables
    add_settings_field(
        'tables', 
        perfmatters_title(__('Tables', 'perfmatters'), 'tables', 'https://perfmatters.io/docs/wordpress-database-tables/'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'tables',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'tooltip' => __('Include tables in your database optimization.', 'perfmatters')
        )
    );

    if(!get_transient('perfmatters_database_optimization_process')) {

        //optimize database
        add_settings_field(
            'optimize_database', 
            perfmatters_title(__('Optimize Database', 'perfmatters'), 'optimize_database', 'https://perfmatters.io/docs/optimize-wordpress-database/'), 
            'perfmatters_print_input',
            'perfmatters_tools', 
            'database', 
            array(
                'id' => 'optimize_database',
                'input' => 'button',
                'action' => 'optimize_database',
                'title' => __('Optimize Now', 'perfmatters'),
                'option' => 'perfmatters_tools',
                'section' => 'database',
                'confirmation' => __('This will make permanent changes that cannot be reverted! Are you sure you want to proceed with optimization?', 'perfmatters'),
                'tooltip' => __('Run a one-time optimization of your WordPress database based on the selected options above. This process runs in the background.', 'perfmatters')
            )
        );
    }
    else {

        //cancel optimization
        add_settings_field(
            'cancel_optimization', 
            perfmatters_title(__('Cancel Optimization', 'perfmatters'), 'cancel_optimization', 'https://perfmatters.io/docs/optimize-wordpress-database/'), 
            'perfmatters_print_input',
            'perfmatters_tools', 
            'database', 
            array(
                'id' => 'cancel_optimization',
                'input' => 'button',
                'action' => 'cancel_optimization',
                'title' => __('Cancel Current Optimization', 'perfmatters'),
                'option' => 'perfmatters_tools',
                'section' => 'database',
                'tooltip' => __('Cancel the current database optimization process.', 'perfmatters')
            )
        );
    }

    //Scheduled Optimization
    add_settings_field(
        'optimize_schedule', 
        perfmatters_title(__('Scheduled Optimization', 'perfmatters'), 'optimize_schedule', 'https://perfmatters.io/docs/optimize-wordpress-database/#schedule'), 
        'perfmatters_print_input', 
        'perfmatters_tools', 
        'database', 
        array(
            'id' => 'optimize_schedule',
            'option' => 'perfmatters_tools',
            'section' => 'database',
            'input' => 'select',
            'options' => array(
                "" => __('Disabled', 'perfmatters'),
                "daily" => __('Daily', 'perfmatters'),
                "weekly" => __('Weekly', 'perfmatters'),
                "monthly" => __('Monthly', 'perfmatters')
                ),
            'tooltip' => __('Schedule a routine optimization of your WordPress database based on the selected options above. This process runs in the background and starts immediately after saving.', 'perfmatters')
        )
    );

    register_setting('perfmatters_tools', 'perfmatters_tools', 'perfmatters_sanitize_tools');

    //edd license option
	register_setting('perfmatters_edd_license', 'perfmatters_edd_license_key', 'perfmatters_edd_sanitize_license');
}
add_action('admin_init', 'perfmatters_settings');

//options default values
function perfmatters_default_options() {
	$defaults = array(
        'fonts' => array(
            'subsets' => array('latin')
        ),
        'cdn' => array(
            'cdn_directories' => 'wp-content,wp-includes',
            'cdn_exclusions' => '.php'
        )
	);
    perfmatters_network_defaults($defaults, 'perfmatters_options');
	return apply_filters('perfmatters_default_options', $defaults);
}

//tools default values
function perfmatters_default_tools() {
    $defaults = array();
    perfmatters_network_defaults($defaults, 'perfmatters_tools');
    return apply_filters('perfmatters_default_tools', $defaults);
}

//network defaults
function perfmatters_network_defaults(&$defaults, $option) {
    if(is_multisite() && is_plugin_active_for_network('perfmatters/perfmatters.php')) {
        $perfmatters_network = get_site_option('perfmatters_network');
        if(!empty($perfmatters_network['default'])) {
            $networkDefaultOptions = get_blog_option($perfmatters_network['default'], $option);
            if($option == 'perfmatters_options') {
                unset($networkDefaultOptions['cdn']['cdn_url']);
            }
            if(!empty($networkDefaultOptions)) {
                foreach($networkDefaultOptions as $key => $val) {
                    $defaults[$key] = $val;
                }
            }
        }
    }
}

//print settings header
function perfmatters_settings_header($text, $dashicon = '') {
    echo '<h2 class="perfmatters-settings-header">' . ($dashicon ? '<span class="dashicons ' . $dashicon . '"></span>' : '') . $text . '</h2>';
}

//print settings section
function perfmatters_settings_section($page, $section, $dashicon = '', $class = '') {

    global $wp_settings_sections;
    
    if(!empty($wp_settings_sections[$page][$section])) {

        global $wp_settings_fields;
        
        echo '<div class="perfmatters-settings-section">';
            if(!empty($wp_settings_sections[$page][$section]['title'])) {
                echo '<h2>' . ($dashicon ? '<span class="dashicons ' . $dashicon . '"></span>' : '') . __($wp_settings_sections[$page][$section]['title'], 'perfmatters') . '</h2>';
            }
            if(!empty($wp_settings_fields[$page][$section])) {
                echo '<table class="form-table">';
                    echo '<tbody>';
                        do_settings_fields($page, $section);
                    echo '</tbody>';
                echo '</table>';
            }
        echo '</div>';
    }
}

//print form inputs
function perfmatters_print_input($args) {

    $selection_id = $args['id'];

    if(!empty($args['option'])) {
        $option = $args['option'];
        if($args['option'] == 'perfmatters_network') {
            $options = get_site_option($args['option']);
        }
        else {
            $options = get_option($args['option']);
        }
    }
    else {
        $option = 'perfmatters_options';
        $options = get_option('perfmatters_options');
    }
    if(!empty($args['option']) && $args['option'] == 'perfmatters_tools') {
        $tools = $options;
    }
    else {
        $tools = get_option('perfmatters_tools');
    }

    //set section variables
    if(!empty($args['section'])) {
        $selection_id = $args['section'] . '-' . $args['id'];
        $option = $option . '[' . $args['section'] . ']';
        $options = isset($options[$args['section']]) ? $options[$args['section']] : array();
    }


    //text
    if(!empty($args['input']) && ($args['input'] == 'text' || $args['input'] == 'color')) {
        echo "<input type='text' id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' value='" . (!empty($options[$args['id']]) ? $options[$args['id']] : '') . "' placeholder='" . (!empty($args['placeholder']) ? $args['placeholder'] : '') . "'" . (!empty($args['validate']) ? " perfmatters_validate='" . $args['validate'] . "'" : "") . " />";
    }

    //select
    elseif(!empty($args['input']) && $args['input'] == 'select') {
        echo "<select id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]'>";
            foreach($args['options'] as $value => $title) {
                echo "<option value='" . $value . "' "; 
                if(!empty($options[$args['id']]) && $options[$args['id']] == $value) {
                    echo "selected";
                } 
                echo ">" . $title . "</option>";
            }
        echo "</select>";
    }

    //button
    elseif(!empty($args['input']) && $args['input'] == 'button') {
        perfmatters_action_button($args['action'] ?? '', $args['title'], 'secondary', $args['confirmation'] ?? '');
    }

    //text area
    elseif(!empty($args['input']) && $args['input'] == 'textarea') {
        echo "<textarea id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' placeholder='" . (!empty($args['placeholder']) ? $args['placeholder'] : '') . "'" . (!empty($args['textareatype']) && $args['textareatype'] == 'codemirror' ? " class='perfmatters-codemirror'" : "" ) . ">";
            if(!empty($options[$args['id']])) {
                if(!empty($args['textareatype']) && $args['textareatype'] == 'oneperline') {
                    foreach($options[$args['id']] as $line) {
                        echo $line . "\n";
                    }
                }
                else {
                    echo $options[$args['id']];
                }
            }
        echo "</textarea>";
    }

    //checkbox + toggle
    else {
        if(empty($tools['accessibility_mode']) && (empty($args['input']) || $args['input'] != 'checkbox')) {
            echo "<label for='" . $selection_id . "' class='perfmatters-switch'>";
        }
            echo "<input type='checkbox' id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' value='1' style='display: inline-block; margin: 0px;' ";
            if(!empty($options[$args['id']])) {
                echo "checked";
            }
            if(!empty($args['confirmation'])) {
                echo " onChange=\"this.checked=this.checked?confirm('" . $args['confirmation'] . "'):false;\"";
            }
            echo ">";
        if(empty($tools['accessibility_mode']) && (empty($args['input']) || $args['input'] != 'checkbox')) {
               echo "<div class='perfmatters-slider'></div>";
           echo "</label>";
        }

        if(!empty($args['section']) && $args['section'] == 'database') {
            echo '<span class="perfmatters-option-data"></span>';
        }
    }

    //tooltip
	if(!empty($args['tooltip'])) {
		perfmatters_tooltip($args['tooltip']);
	}
}

//print simple exclusions
function perfmatters_print_quick_exclusions($args) {

    $options = get_option('perfmatters_options');

    //master exclusions array
    $master = Perfmatters\JS::get_quick_exclusions_master();

    //local exclusions
    $exclusions = array(
        'plugins' => array(
            'title' => __('Plugins', 'perfmatters'),
            'items' => array(),
            'dashicon' => 'admin-plugins'
        ),
        'themes' => array(
            'title' => __('Themes', 'perfmatters'),
            'items' => array(),
            'dashicon' => 'admin-appearance'
        )
    );

    //add any active plugin sets to list
    $active_plugins = (array) get_option('active_plugins', array());

    if(is_multisite()) {
        $active_plugins = array_merge($active_plugins, array_keys((array) get_site_option('active_sitewide_plugins', array())));
    }

    foreach($master['plugins'] as $key => $exclusion_set) {
        if(in_array($exclusion_set['id'], $active_plugins)) {
            $exclusions['plugins']['items'][] = $key;
        }
    }

    //add any active theme sets to list
    $theme = wp_get_theme();
    $parent = $theme->get_template();
    $active_theme = strtolower(!empty($parent) ? $parent : $theme->get('Name'));

    foreach($master['themes'] as $key => $exclusion_set) {
        if($exclusion_set['id'] == $active_theme) {
            $exclusions['themes']['items'][] = $key;
        }
    }

    //quick exclusions ui
    echo '<div class="perfmatters-input-row-wrapper">';
        echo '<div class="perfmatters-input-row-container">';

            if(empty($exclusions['plugins']['items']) && empty($exclusions['themes']['items'])) {
                echo '<style>.delay_js_quick_exclusions { display: none; }</style>';
            }

            foreach($exclusions as $type => $data) {

                if(!empty($data['items'])) {

                    $opened = !empty($options['assets']['delay_js_quick_exclusions'][$type]) ? ' perfmatters-opened' : '';

                    //quick exclusion section
                    echo '<div class="perfmatters-quick-exclusion' . $opened . '">';

                        //title bar
                        echo '<div class="perfmatters-quick-exclusion-title-bar" style="display: flex; justify-content: space-between;">';
                            echo '<div style="display: flex; align-items: center;">';
                                echo '<span class="dashicons dashicons-' . $data['dashicon'] . '" style="margin-right: 5px;"></span>';
                                echo $data['title'];
                            echo '</div>';

                            echo '<span class="perfmatters-quick-exclusion-toggle dashicons dashicons-plus"></span>';
                            echo '<span class="perfmatters-quick-exclusion-toggle dashicons dashicons-minus"></span>';
                        echo '</div>';

                        //exclusions
                        echo '<div class="perfmatters-quick-exclusion-items">';
                            foreach($data['items'] as $item) {
                                echo '<div style="margin-top: 5px;">';
                                    echo '<input type="checkbox" name="perfmatters_options[assets][delay_js_quick_exclusions][' . $type . '][' . $item . ']" value="1" ' . (!empty($options['assets'][$args['id']][$type][$item]) ? 'checked ' : '') . '/>';
                                    echo $master[$type][$item]['title'];
                                echo '</div >';
                            }
                        echo '</div>';

                    echo '</div>';
                }
            }
        echo '</div>';
    echo '</div>';

    //tooltip
    if(!empty($args['tooltip'])) {
        perfmatters_tooltip($args['tooltip']);
    }
}

//input rows ui
function perfmatters_print_input_rows($args) {

    $perfmatters_options = get_option('perfmatters_options');
 
    echo '<div class="perfmatters-input-row-wrapper">';
        echo '<div class="perfmatters-input-row-container">';

            $rowCount = 0;

            if(!empty($perfmatters_options[$args['section']][$args['id']]) && is_array($perfmatters_options[$args['section']][$args['id']])) {

                foreach($perfmatters_options[$args['section']][$args['id']] as $line) {

                    call_user_func('perfmatters_print_' . $args['id'] . '_row', $rowCount, $line);

                    $rowCount++;
                }
            }
            else {

                //print empty row at the end
                call_user_func('perfmatters_print_' . $args['id'] . '_row', $rowCount);
            }

        echo '</div>';

        //add new row
        echo '<a href="#" class="perfmatters-add-input-row button button-secondary" rel="' . $rowCount . '"><span class="dashicons dashicons-plus"></span>' . __('Add New', 'perfmatters') . '</a>';

    echo '</div>';

    //tooltip
    if(!empty($args['tooltip'])) {
        perfmatters_tooltip($args['tooltip']);
    }
}

//preload input row
function perfmatters_print_preload_row($rowCount = 0, $line = array()) {

    echo '<div class="perfmatters-input-row"' . (empty($line['url']) ? ' style="display: none;"' : '') . '>';

        echo '<div style="display: flex; width: 100%; align-items: center;">';
            echo '<input type="text" id="preload-' . $rowCount . '-url" name="perfmatters_options[preload][preload][' . $rowCount . '][url]" value="' . (isset($line['url']) ? $line['url'] : '') . '" placeholder="https://example.com/font.woff2" />';

            $types = array(
                'fetch'  => 'Fetch',
                'font'   => 'Font',
                'image'  => 'Image',
                'script' => 'Script',
                'style'  => 'Style',
                'track'  => 'Track'
            );

            echo '<select id="preload-' . $rowCount . '-as" name="perfmatters_options[preload][preload][' . $rowCount . '][as]" style="margin-left: 5px;">';
                echo '<option value="">' . __('Select Type', 'perfmatters') . '</option>';
                foreach($types as $value => $label) {
                    echo '<option value="' . $value . '"' . (isset($line['as']) && $line['as'] == $value ? ' selected="selected"' : '') . '>' . $label . '</option>';
                }
            echo '</select>';

            echo '<a href="#" class="perfmatters-expand-input-row" title="' . __('Settings', 'perfmatters') . '" style="margin-left: 8px; text-decoration: none;"><span class="dashicons dashicons-admin-generic"></span></a>';
            echo '<a href="#" class="perfmatters-delete-input-row" title="' . __('Remove', 'perfmatters') . '"><span class="dashicons dashicons-trash"></span></a>';
        echo '</div>';

        echo '<div class="perfmatters-input-row-extra">';

            echo '<select id="preload-' . $rowCount . '-device" name="perfmatters_options[preload][preload][' . $rowCount . '][device]">';
                echo '<option value="">' . __('All Devices', 'perfmatters') . '</option>';
                echo '<option value="desktop"' . (isset($line['device']) && $line['device'] == 'desktop' ? ' selected="selected"' : '') . '>' . __('Desktop', 'perfmatters') . '</option>';
                echo '<option value="mobile"' . (isset($line['device']) && $line['device'] == 'mobile' ? ' selected="selected"' : '') . '>' . __('Mobile', 'perfmatters') . '</option>';
            echo '</select>';

            echo '<label class="perfmatters-inline-label-input"><span>' . __('Location', 'perfmatters') . '</span>';
                echo '<input type="text" id="preload-' . $rowCount . '-locations" name="perfmatters_options[preload][preload][' . $rowCount . '][locations]" value="' . (isset($line['locations']) ? $line['locations'] : '') . '" placeholder="23,19,blog" />';
            echo '</label>';

            echo '<label class="perfmatters-inline-label-input"><span>' . __('Priority', 'perfmatters') . '</span>';
                echo '<select id="preload-' . $rowCount . '-priority" name="perfmatters_options[preload][preload][' . $rowCount . '][priority]" />';
                    echo '<option value="">' . __('Auto', 'perfmatters') . '</option>';
                    echo '<option value="high"' . (isset($line['priority']) && $line['priority'] == 'high' ? ' selected="selected"' : '') . '>' . __('High', 'perfmatters') . '</option>';
                    echo '<option value="low"' . (isset($line['priority']) && $line['priority'] == 'low' ? ' selected="selected"' : '') . '>' . __('Low', 'perfmatters') . '</option>';

                echo '</select>';
            echo '</label>';

        echo '</div>';
    echo "</div>";
}

//fetch priority input row
function perfmatters_print_fetch_priority_row($rowCount = 0, $line = array()) {

    echo '<div class="perfmatters-input-row"' . (empty($line['selector']) ? ' style="display: none;"' : '') . '>';

        echo '<div style="display: flex; width: 100%; align-items: center;">';
            echo '<input type="text" id="fetch-priority-' . $rowCount . '-url" name="perfmatters_options[preload][fetch_priority][' . $rowCount . '][selector]" value="' . (isset($line['selector']) ? esc_attr($line['selector']) : '') . '" placeholder="example-class" style="" />';

            $types = array(
                'high' => 'High',
                'low'  => 'Low'
            );

            echo '<select id="fetch-priority-' . $rowCount . '-as" name="perfmatters_options[preload][fetch_priority][' . $rowCount . '][priority]" style="margin-left: 5px;">';
                echo '<option value="">' . __('Select Priority', 'perfmatters') . '</option>';
                foreach($types as $value => $label) {
                    echo '<option value="' . $value . '"' . (isset($line['priority']) && $line['priority'] == $value ? ' selected="selected"' : '') . '>' . $label . '</option>';
                }
            echo '</select>';

            echo '<a href="#" class="perfmatters-expand-input-row" title="' . __('Settings', 'perfmatters') . '" style="margin-left: 8px; text-decoration: none;"><span class="dashicons dashicons-admin-generic"></span></a>';

            echo '<a href="#" class="perfmatters-delete-input-row" title="' . __('Remove', 'perfmatters') . '"><span class="dashicons dashicons-trash"></span></a>';

        echo '</div>';

        echo '<div class="perfmatters-input-row-extra">';

            echo '<select id="fetch-priority-' . $rowCount . '-device" name="perfmatters_options[preload][fetch_priority][' . $rowCount . '][device]" style="">';
                echo '<option value="">' . __('All Devices', 'perfmatters') . '</option>';
                echo '<option value="desktop"' . (isset($line['device']) && $line['device'] == 'desktop' ? ' selected="selected"' : '') . '>' . __('Desktop', 'perfmatters') . '</option>';
                echo '<option value="mobile"' . (isset($line['device']) && $line['device'] == 'mobile' ? ' selected="selected"' : '') . '>' . __('Mobile', 'perfmatters') . '</option>';
            echo '</select>';

            echo '<label class="perfmatters-inline-label-input" style="margin-left: 5px;"><span>' . __('Location', 'perfmatters') . '</span>';
                echo '<input type="text" id="fetch-priority-' . $rowCount . '-locations" name="perfmatters_options[preload][fetch_priority][' . $rowCount . '][locations]" value="' . (isset($line['locations']) ? $line['locations'] : '') . '" placeholder="23,19,blog" style="min-width: auto; padding-left: 74px;" />';
            echo '</label>';

            echo '<label for="fetch-priority-' . $rowCount . '-parent">';
                echo '<input type="checkbox" id="fetch-priority-' . $rowCount . '-parent" name="perfmatters_options[preload][fetch_priority][' . $rowCount . '][parent]"' . (!empty($line['parent']) ? ' checked' : '') . ' value="1" /> Search by Parent Selector';
            echo '</label>';

        echo '</div>';
    echo '</div>';
}

//preconnect input row
function perfmatters_print_preconnect_row($rowCount = 0, $line = '') {

    //check for previous vs new format
    if(is_array($line)) {
        $url = $line['url'];
        $crossorigin = isset($line['crossorigin']) ? $line['crossorigin'] : 0;
    }
    elseif(!empty($line)) {
        $url = $line;
        $crossorigin = 1;
    }

    //print row
    echo '<div class="perfmatters-input-row"' . (empty($url) ? ' style="display: none;"' : '') . '>';
        echo '<div class="perfmatters-input-row-hero">';
            echo '<input type="text" id="preconnect-' . $rowCount . '-url" name="perfmatters_options[preload][preconnect][' . $rowCount . '][url]" value="' . ($url ?? ''). '" placeholder="https://example.com" />';
            echo '<a href="#" class="perfmatters-expand-input-row" title="' . __('Settings', 'perfmatters') . '" style="margin-left: 8px; text-decoration: none;"><span class="dashicons dashicons-admin-generic"></span></a>';
            echo '<a href="#" class="perfmatters-delete-input-row" title="' . __('Remove', 'perfmatters') . '"><span class="dashicons dashicons-trash"></span></a>';
        echo '</div>';
        echo '<div class="perfmatters-input-row-extra">';
            echo '<label for="preconnect-' . $rowCount . '-crossorigin" style="margin-left: 0px;">';
                echo "<input type='checkbox' id='preconnect-" . $rowCount . "-crossorigin' name='perfmatters_options[preload][preconnect][" . $rowCount . "][crossorigin]' " . (!empty($crossorigin) ? "checked" : "") . " value='1' /> CrossOrigin";
            echo '</label>';
        echo '</div>';
    echo '</div>';
}

//print subset options
function perfmatters_print_subsets($args) {

    $perfmatters = get_option('perfmatters_options');

    $subset_options = array(
        'arabic'              => 'Arabic',
        'bengali'             => 'Bengali',
        'chinese-hongkong'    => 'Chinese (Hong Kong)',
        'chinese-simplified'  => 'Chinese (Simplified)',
        'chinese-traditional' => 'Chinese (Traditional)',
        'cyrillic'            => 'Cyrillic',
        'cyrillic-ext'        => 'Cyrillic Extended',
        'devanagari'          => 'Devanagari',
        'greek'               => 'Greek',
        'greek-ext'           => 'Greek Extended',
        'gujarati'            => 'Gujarati',
        'gurmukhi'            => 'Gurmukhi',
        'hebrew'              => 'Hebrew',
        'japanese'            => 'Japanese',
        'kannada'             => 'Kannada',
        'khmer'               => 'Khmer',
        'korean'              => 'Korean',
        'latin'               => 'Latin (' . __('Default', 'perfmatters') . ')',
        'latin-ext'           => 'Latin Extended',
        'malayalam'           => 'Malayalam',
        'math'                => 'Math',
        'myanmar'             => 'Myanmar',
        'oriya'               => 'Oriya',
        'sinhala'             => 'Sinhala',
        'symbols'             => 'Symbols',
        'tamil'               => 'Tamil',
        'telugu'              => 'Telugu',
        'thai'                => 'Thai',
        'tibetan'             => 'Tibetan',
        'vietnamese'          => 'Vietnamese'
    );

    //checkboxes
    echo '<div id="perfmatters-subsets">';
        foreach($subset_options as $key => $name) {
            echo '<label for="perfmatters-purge-meta-' . $key . '" style="margin-right: 10px; text-wrap: nowrap;">';
                echo '<input type="checkbox" name="perfmatters_options[fonts][subsets][]" id="perfmatters-subsets-' . $key . '" value="' . $key . '"' . (!empty($perfmatters['fonts']['subsets']) && in_array($key, $perfmatters['fonts']['subsets']) ? ' checked' : '') . ' />';
                echo $name;
            echo '</label>';
        }
    echo '</div>';

    //tooltip
    if(!empty($args['tooltip'])) {
        perfmatters_tooltip($args['tooltip']);
    }
}

//print purge meta options
function perfmatters_print_purge_meta($args) {

    //input + button
    $meta_options = array(
        'perfmatters_exclude_defer_js' => 'Defer JavaScript', 
        'perfmatters_exclude_delay_js' => 'Delay JavaScript', 
        'perfmatters_exclude_minify_js' => 'Minify JavaScript',
        'perfmatters_exclude_unused_css' => 'Unused CSS', 
        'perfmatters_exclude_minify_css' => 'Minify CSS', 
        'perfmatters_exclude_lazy_loading' => 'Lazy Loading', 
        'perfmatters_exclude_instant_page' => 'Instant Page'
    );
    echo "<div style='margin-bottom: 10px;' id='perfmatters-purge-meta'>";
        foreach($meta_options as $key => $name) {
            echo "<label for='perfmatters-purge-meta-" . $key . "' style='margin-right: 10px; text-wrap: nowrap;'>";
                echo "<input type='checkbox' name='perfmatters_tools_temp[purge_meta_options][]' id='perfmatters-purge-meta-" . $key . "' value='" . $key . "' />";
                echo $name;
            echo "</label>";
        }
    echo "</div>";
    perfmatters_action_button('purge_meta', __('Purge Meta Options', 'perfmatters'), 'secondary', $args['confirmation'] ?? '');

    //tooltip
    if(!empty($args['tooltip'])) {
        perfmatters_tooltip($args['tooltip']);
    }
}

//print import settings
function perfmatters_print_import_settings($args) {

	//input + button
    echo "<input type='file' id='perfmatters-import-settings-file' name='perfmatters_import_settings_file' /><br />";
    perfmatters_action_button('import_settings', __('Import Plugin Settings', 'perfmatters'), 'secondary');

    //tooltip
    if(!empty($args['tooltip'])) {
    	perfmatters_tooltip($args['tooltip']);
    }
}

//sanitize options
function perfmatters_sanitize_options($values) {

    //textarea inputs with one per line
    $sections_one_per_line = array(
        'lazyload' => array(
            'lazy_loading_exclusions',
            'lazy_loading_parent_exclusions',
            'css_background_selectors',
            'element_selectors'
        ),
        'assets' => array(
            'js_exclusions',
            'delay_js_inclusions',
            'delay_js_exclusions',
            'minify_js_exclusions',
            'rucss_excluded_stylesheets',
            'rucss_excluded_selectors',
            'minify_css_exclusions'
        ),
        'preload' => array(
            'dns_prefetch'
        )
    );

    foreach($sections_one_per_line as $section => $options) {
        foreach($options as $id) {
            if(!empty($values[$section][$id])) {
                perfmatters_sanitize_one_per_line($values[$section][$id]);
            }
        }
    }

    //input rows
    $sections_input_rows = array(
        'preload' => array(
            'preload' => 'url',
            'preconnect' => 'url',
            'fetch_priority' => 'selector'
        )
    );

    foreach($sections_input_rows as $section => $options) {
        foreach($options as $id => $field) {
            if(!empty($values[$section][$id])) {
                foreach($values[$section][$id] as $key => $line) {
                    $val = trim($line[$field]);
                    if(empty($val)) {
                        unset($values[$section][$id][$key]);
                    }
                    else {
                        $values[$section][$id][$key][$field] = $val;
                    }
                }
                $values[$section][$id] = array_values($values[$section][$id]);
            }
        }
    }

    return $values;
}

//sanitize edd license
function perfmatters_edd_sanitize_license($new) {
	$old = get_option( 'perfmatters_edd_license_key' );
	if($old && $old != $new) {
		delete_option( 'perfmatters_edd_license_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}

//sanitize one per line text field
function perfmatters_sanitize_one_per_line(&$value) {
    if(!is_array($value)) {
        $text = trim($value);
        $text_array = explode("\n", $text);
        $text_array = array_filter(array_map('trim', $text_array));
        $value = $text_array;
    }
}

//print tooltip
function perfmatters_tooltip($tooltip) {
    if(!empty($tooltip)) {
        $tools = get_option('perfmatters_tools');
        echo "<span class='perfmatters-tooltip-text" . (!empty($tools['accessibility_mode']) ? "-am" : "") . "'>" . $tooltip . "<span class='perfmatters-tooltip-subtext'>" . sprintf(__("Click %s to view documentation.", 'perfmatters'), "<span class='perfmatters-tooltip-icon'>?</span>") . "</span></span>";
    }
}

//print title
function perfmatters_title($title, $id = false, $link = false) {

    if(!empty($title)) {

        $var = "<span class='perfmatters-title-wrapper'>";

            //label + title
            if(!empty($id)) {
                $var.= "<label for='" . $id . "'>" . $title . "</label>";
            }
            else {
                $var.= $title;
            }

            //tooltip icon + link
            if(!empty($link)) {
                $tools = get_option('perfmatters_tools');
                 $var.= "<a" . (!empty($link) ? " href='" . $link . "'" : "") . " class='perfmatters-tooltip'" . (!empty($tools['accessibility_mode']) ? " title='" . __("View Documentation", 'perfmatters') . "'" : "") . " target='_blank'>?</a>";
            }

        $var.= "</span>";

        return $var;
    }
}

//action button
function perfmatters_action_button($action, $label, $type = 'primary', $confirmation = '') {
    echo '<div class="perfmatters-button-container">';
        echo '<button name="submit" id="submit" class="button button-' . $type . '" data-pm-action="' . $action . '"' . (!empty($confirmation) ? ' data-pm-confirmation="' . $confirmation . '"' : '') . ' style="display: flex; align-items: center;">';
            echo '<span class="perfmatters-button-text">' . $label . '</span>';
            echo '<svg class="perfmatters-button-spinner" viewBox="0 0 100 100" role="presentation" focusable="false" style="background: rgba(0,0,0,.1); border-radius: 100%; width: 16px; height: 28px; margin: 0px 2px; overflow: visible; opacity: 1; background-color: transparent; display: none;"><circle cx="50" cy="50" r="50" vector-effect="non-scaling-stroke" style="fill: transparent; stroke-width: 1.5px; stroke: #fff;"></circle><path d="m 50 0 a 50 50 0 0 1 50 50" vector-effect="non-scaling-stroke" style="fill: transparent; stroke-width: 1.5px; stroke: #4A89DD; stroke-linecap: round; transform-origin: 50% 50%; animation: 1.4s linear 0s infinite normal both running perfmatters-spinner;"></path></svg>';
        echo '</button>';
        echo '<div class="perfmatters-button-message" style="display: none; margin-left: 10px; "></div>';
    echo '</div>';
}