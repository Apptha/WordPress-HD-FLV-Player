/**
 * @name          : Script for Hd Flv Player
 * @version	  : 2.5
 * @package       : apptha
 * @subpackage    : wp-flash-player
 * @author        : Apptha - http://www.apptha.com
 * @copyright     : Copyright (C) 2011 Powered by Apptha
 * @license	      : GNU General Public License version 2 or later; see LICENSE.txt
 * @Purpose       : For Validation and Sortable Process
 * @Creation Date : Dec 09, 2011
 * @Modified Date : Jul 23, 2012
 * */

var YoutubeVideoid;
var scriptLoaded = false;
function YouTube_Error( Youtubeid ){
   YoutubeVideoid = Youtubeid;
if(document.getElementById('videoPlay')) {
   document.getElementById('videoPlay').innerHTML = '<div id="iframeplayer"></div>';
} else {
if(document.getElementById('flashplayer'))
   document.getElementById('flashplayer').innerHTML = '<div id="iframeplayer"></div>';
}
 if(!scriptLoaded) {
   var tag = document.createElement("script");
   tag.src = "https://www.youtube.com/iframe_api";
   scriptLoaded=true; 
   var firstScriptTag = document.getElementsByTagName("script")[0];
   firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
 } else {
   onYouTubeIframeAPIReady();
 }
}
function onYouTubeIframeAPIReady() {  
     player = new YT.Player('iframeplayer', {
      width: "100%",
      videoId: YoutubeVideoid,
      playerVars: {
          'autoplay': 1
       
        },
      events: {
        'onStateChange': onPlayerStateChange
      }
    });
}
function onPlayerStateChange(event) {
   var done = false;
   if (event.data == YT.PlayerState.PLAYING && !done) {
      currentVideoP(YoutubeVideoid);
      done = true;
   }
}