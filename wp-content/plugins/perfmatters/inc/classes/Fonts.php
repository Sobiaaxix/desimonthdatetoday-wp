<?php
namespace Perfmatters;

if(!defined('REQUESTS_SILENCE_PSR0_DEPRECATIONS')) {
    define('REQUESTS_SILENCE_PSR0_DEPRECATIONS', true);
}
use Requests as RequestsOld; //deprecated

class Fonts
{
    private static $font_file_cache_url = PERFMATTERS_CACHE_URL;

    //initialize fonts
    public static function init() {
        if(empty(Config::$options['fonts']['disable_google_fonts'])) {
            add_action('perfmatters_queue', array('Perfmatters\Fonts', 'queue'));
        }
        add_action('wp_ajax_perfmatters_clear_local_fonts', array('Perfmatters\Fonts', 'clear_local_fonts_ajax'));
    }

    //queue functions
    public static function queue()
    {

        //add display swap to the buffer
        if(!empty(Config::$options['fonts']['display_swap'])) {
            add_action('perfmatters_output_buffer_template_redirect', array('Perfmatters\Fonts', 'display_swap'));
        }

        //add local google fonts to the buffer
        if(!empty(Config::$options['fonts']['local_google_fonts'])) {
            add_action('perfmatters_output_buffer_template_redirect', array('Perfmatters\Fonts', 'local_google_fonts'));
        }
    }

    //add display swap to google font files
    public static function display_swap($html) {

        //find google fonts
        preg_match_all('#<link[^>]+?href=(["\'])([^>]*?fonts\.googleapis\.com\/css.*?)\1.*?>#i', $html, $google_fonts, PREG_SET_ORDER);
        if(!empty($google_fonts)) {
            foreach($google_fonts as $google_font) {

                //replace display parameter
                $new_href = preg_replace('/&display=(auto|block|fallback|optional|swap)/', '', html_entity_decode($google_font[2]));
                $new_href.= '&display=swap';

                //create font tag with new href
                $new_google_font = str_replace($google_font[2], $new_href, $google_font[0]);

                //replace original font tag
                $html = str_replace($google_font[0], $new_google_font, $html);
            }
        }

        return $html;
    }

    //download and host google font files locally
    public static function local_google_fonts($html) {

        //create our fonts cache directory
        if(!is_dir(PERFMATTERS_CACHE_DIR . 'fonts/')) {
            @mkdir(PERFMATTERS_CACHE_DIR . 'fonts/', 0755, true);
        }
        
        //rewrite cdn url in font file cache url
        $cdn_url = !empty(Config::$options['fonts']['cdn_url']) ? Config::$options['fonts']['cdn_url'] : (!empty(Config::$options['cdn']['enable_cdn']) && !empty(Config::$options['cdn']['cdn_url']) ? Config::$options['cdn']['cdn_url'] : '');
        if(!empty($cdn_url)) {
            self::$font_file_cache_url = str_replace(site_url(), untrailingslashit($cdn_url), PERFMATTERS_CACHE_URL);
        }

        //remove existing google font preconnect + prefetch links
        preg_match_all('#<link(?:[^>]+)?href=(["\'])([^>]*?fonts\.(gstatic|googleapis)\.com.*?)\1.*?>#i', $html, $google_links, PREG_SET_ORDER);
        if(!empty($google_links)) {
            foreach($google_links as $google_link) {
                if(preg_match('#rel=(["\'])(.*?(preconnect|prefetch).*?)\1#i', $google_link[0])) {
                    $html = str_replace($google_link[0], '', $html);
                }
            }
        }

        //find google fonts
        preg_match_all('#<link[^>]+?href=(["\'])([^>]*?fonts\.googleapis\.com\/(css|icon).*?)\1.*?>#i', $html, $google_fonts, PREG_SET_ORDER);
        if(!empty($google_fonts)) {

            $count = 1;

            foreach($google_fonts as $google_font) {
     
                //create unique file details
                $file_name = substr(md5($google_font[2]), 0, 12) . ".google-fonts.min.css";
                $file_path = PERFMATTERS_CACHE_DIR . 'fonts/' . $file_name;
                $file_url = PERFMATTERS_CACHE_URL . 'fonts/' . $file_name;

                //download file if it doesn't exist
                if(!file_exists($file_path)) {
                    if(!self::download_google_font($google_font[2], $file_path)) {
                        continue;
                    }
                }

                //swap url in original tag
                if(empty(Config::$options['fonts']['method'])) {
                    $new_google_font = str_replace($google_font[2], $file_url, $google_font[0]);
                }
                //inline font
                else {
                    $new_google_font = '<style id="perfmatters-google-font-' . $count . '">' . file_get_contents($file_path) . '</style>';
                }
                
                //replace original font tag
                $html = str_replace($google_font[0], $new_google_font, $html);

                $count++;
            }
        }

        return $html;
    }

    //download and save google font css file
    private static function download_google_font($url, $file_path)
    {
        //add https if using relative scheme
        if(substr($url, 0, 2) === '//') {
            $url = 'https:' . $url;
        }

        //download css file
        $css_response = wp_remote_get(html_entity_decode($url), array('user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'));

        //check valid response
        if(wp_remote_retrieve_response_code($css_response) !== 200) {
            return false;
        }

        //css content
        $css = $css_response['body'];

        //limit subsets
        if(!empty(Config::$options['fonts']['limit_subsets']) && !empty(Config::$options['fonts']['subsets'])) {

            preg_match_all('/\/\*\s([a-z\-]+?)\s\*\/.*?}/s', $css, $fonts, PREG_SET_ORDER);

            if(!empty($fonts)) {
                foreach($fonts as $font) {
                    if(!empty($font[1]) && !in_array($font[1], Config::$options['fonts']['subsets'])) {
                        $css = str_replace($font[0], '', $css);
                    }
                }
            }
        }

        //find font files inside the css
        $regex = '/url\((https:\/\/fonts\.gstatic\.com\/.*?)\)/';
        preg_match_all($regex, $css, $matches);
        $font_urls = array_unique($matches[1]);

        $font_requests = array();
        foreach($font_urls as $font_url) {

            if(!file_exists(PERFMATTERS_CACHE_DIR . 'fonts/' . basename($font_url))) {
                $font_requests[] = array('url' => $font_url, 'type' => 'GET');
            }

            $cached_font_url = self::$font_file_cache_url . 'fonts/' . basename($font_url);
            $css = str_replace($font_url, $cached_font_url, $css);
        }

        //download new font files to cache directory
        if(method_exists('WpOrg\Requests\Requests', 'request_multiple')) { //wp 6.2+
            $font_responses = \WpOrg\Requests\Requests::request_multiple($font_requests);
        }
        elseif(method_exists(RequestsOld::class, 'request_multiple')) { //deprecated
            $font_responses = RequestsOld::request_multiple($font_requests);
        }   

        if(!empty($font_responses)) {
            foreach($font_responses as $font_response) {
                if(is_a($font_response, 'Requests_Response') || is_a($font_response, 'WpOrg\Requests\Response')) {
                    $font_path = PERFMATTERS_CACHE_DIR . 'fonts/' . basename($font_response->url);

                    //save font file
                    file_put_contents($font_path, $font_response->body);
                }
            }
        }

        //minify and save file
        $minifier = new \MatthiasMullie\Minify\CSS($css);
        $minifier->minify($file_path);

        return true;
    }

    //delete all files in the fonts cache directory
    public static function clear_local_fonts()
    {
        $files = glob(PERFMATTERS_CACHE_DIR . 'fonts/*');
        foreach($files as $file) {
            if(is_file($file)) {
                unlink($file);
            }
        }
    }

    //clear local fonts ajax action
    public static function clear_local_fonts_ajax() {

        Ajax::security_check();

        self::clear_local_fonts();

        wp_send_json_success(array(
            'message' => __('Local fonts cleared.', 'perfmatters'), 
        ));
    }
}