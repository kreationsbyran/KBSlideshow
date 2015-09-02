<%-- Demonstration of functionality, using slick (https://github.com/kenwheeler/slick) --%>

<%-- Get slick from CDN --%>
<% require css(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css) %>
<% require css(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css) %>
<% require javascript(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js) %>

<%-- Initialize slick --%>
<script type="text/javascript">
$( document ).ready( function() {

    // Slick settings (just a couple)
    // Full list of settings can be found here: https://github.com/kenwheeler/slick/#settings
    var cfg = {

        dots: true,
        speed: 300,
        autoplay: false,
        autoPlayspeed: 3000,
        cssEase: 'ease',
        draggable: true,
        arrows: true,
        infinite: true

    };

    // Initialize
    $( '.kbslideshow' ).slick( cfg );

});
</script>