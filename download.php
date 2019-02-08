<?php
/*
  Name: WP Flash Player
  Plugin URI: http://www.apptha.com/category/extension/Wordpress/HD-FLV-Player-Plugin/
  Description: Player main function file.
  Version: 1.2.0.1
  Author: Apptha
  Author URI: http://www.apptha.com
  License: GPL2
 */
require_once( dirname(__FILE__) . '/hdflv-config.php');
$url                = $_GET['f'];
$wp_upload          = wp_upload_dir();
$wp_urlpath         = $wp_upload['path'] . '/';
$filename           = $wp_urlpath.$url;
$allowedExtensions  = array("avi", "AVI", "dv", "DV", "3gp", "3GP", "3g2", "3G2", "mpeg", "MPEG", "wav", "WAV", "rm",
                    "RM", "mp3", "MP3", "flv", "FLV", "mp4", "MP4", "m4v", "M4V", "M4A", "m4a", "MOV", "mov", "mp4v", "Mp4v",
                    "F4V", "f4v");
$output             = in_array(end(explode(".", $filename)), $allowedExtensions);
if (!$output) { 
    return false;
} else { 
    if(file_exists($filename)){
    header('Content-disposition: attachment; filename=' . basename($filename));
    readfile($filename);
    }
}
?>