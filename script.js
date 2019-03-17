$( document ).ready(function() {
    
//    var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], object, embed");
    var $allVideos = $( "iframe" );
    
    $( $allVideos ).wrap( "<div class='videoWrapper'></div>" );

	


});

