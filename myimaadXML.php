<?php
/*
  Name: WP Flash Player
  Plugin URI: http://www.apptha.com/category/extension/Wordpress/HD-FLV-Player-Plugin/
  Description: Video IMA AD xml file.
  Version: 1.2.0.1
  Author: Apptha
  Author URI: http://www.apptha.com
  License: GPL2
 */

/* Used to import plugin configuration */
require_once( dirname(__FILE__) . '/hdflv-config.php');
global $wpdb;

$settingsData = $wpdb->get_row("SELECT player_values,player_icons FROM " . $wpdb->prefix . "hdflv_settings");
$player_icons = unserialize($settingsData->player_icons);
$player_values = unserialize($settingsData->player_values);

$imaAds                 = $player_icons['ima_ads'];
$width                  = $player_values['width']-30;
$height                 = $player_values['height']-60;

// Create XML output of playlist

ob_clean();
header("content-type: text/xml");
echo    '<?xml version="1.0" encoding="utf-8"?>';
echo    '<ima>';
if ($imaAds == 1) {
    if(!empty($player_values['ima_ads_xml'])){
            ## video ads
            echo '
                <adSlotWidth></adSlotWidth>
                <adSlotHeight></adSlotHeight>
                <adTagUrl>' . $player_values['ima_ads_xml'] . '</adTagUrl>';
            ## text ads size(468,60)
            echo '<publisherId></publisherId>
                  <contentId></contentId>';
            ## Text or Overlay
            echo '<adType></adType>
                  <channels></channels>';
}else {
            ## video ads
            echo '
                <adSlotWidth></adSlotWidth>
                <adSlotHeight></adSlotHeight>
                <adTagUrl>http://ad.doubleclick.net/pfadx/N270.126913.6102203221521/B3876671.22;dcadv=2215309;sz=0x0;ord=%5btimestamp%5d;dcmt=text/xml</adTagUrl>';

            ## text ads size(468,60)
            echo '<publisherId></publisherId>
                <contentId>1</contentId>';
            ## Text or Overlay
            echo ' <adType>Text</adType>
                <channels>poker</channels>';
}
}
echo '</ima>';
?>