<?php
namespace Perfmatters;

class Buffer
{
    //initialize buffer class
    public static function init()
    {
        add_action('perfmatters_queue', array('Perfmatters\Buffer', 'queue'));
    }

    //queue functions
    public static function queue() 
    {
        //buffer is allowed
        if(!apply_filters('perfmatters_allow_buffer', true)) {
            return;
        }

        //add buffer action
        add_action('template_redirect', array('Perfmatters\Buffer', 'start'), -9999);
    }

    //start buffer
    public static function start()
    {
        if(has_filter('perfmatters_output_buffer_template_redirect')) {

            //exclude certain requests
            if(is_embed() || is_feed() || is_preview() || is_customize_preview() || is_singular(array('bricks_template'))) {
                return;
            }

            //don't buffer amp
            if(function_exists('is_amp_endpoint') && is_amp_endpoint()) {
                return;
            }

            ob_start(function($html) {

                //check for valid buffer
                if(!self::is_valid_buffer($html)) {
                    return $html;
                }

                //run buffer filters
                $html = (string) apply_filters('perfmatters_output_buffer_template_redirect', $html);

                //return processed html
                return $html;
            });
        }
    }

    //make sure buffer content is valid
    private static function is_valid_buffer($html)
    {
        //check for valid/invalid tags
        if(stripos($html, '<html') === false || stripos($html, '</body>') === false || stripos($html, '<xsl:stylesheet') !== false) {
            return false;
        }

        //check for invalid urls
        $current_url = home_url($_SERVER['REQUEST_URI']);
        $matches = apply_filters('perfmatters_buffer_excluded_extensions', array('.xml', '.txt', '.php'));
        foreach($matches as $match) {
            if(stripos($current_url, $match) !== false) {
                return false;
            }
        }

        return true;
    }
}