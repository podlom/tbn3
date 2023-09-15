<?php
/*
 Plugin Name: Banners Network bn3
 Plugin URI: http://www.shkodenko.com
 Description: Display banner using [show_bn lang=en] shortcode.
 Version: 1.0.0
 Author: Taras Shkodenko
 Author URI: http://www.shkodenko.com
 Created on 2016-12-20
 */

class TaBn3Plugin
{
    /** @var string Banners Service Domain Name */
    const BANNER_DOMAIN = 'bn3.shkodenko.com';

    public static function bnShort($atts, $content = '')
    {
        $lang = 'en';
        if (isset($atts['lang'])) {
            $lang = $atts['lang'];
        }
        $num = null;
        if (isset($atts['num'])) {
            $num = $atts['num'];
        }
        $html = file_get_contents('https://' . self::BANNER_DOMAIN . '/?lang=' . $lang . '&num=' . $num);
        if ($html !== false) {
            return $html;
        }
        return '<!-- Banner HTML goes here... -->';
    }
}

add_shortcode('show_bn', ['TaBn3Plugin', 'bnShort']);

/*
 * @exampe footer.php usage in theme
 *
<div id="bn0" class="banner">
    <?php echo do_shortcode('[show_bn lang=en num=0]'); ?>
</div>
 *
 */
