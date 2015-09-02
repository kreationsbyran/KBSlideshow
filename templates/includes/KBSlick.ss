<%-- Get slick from CDN --%>
<% require css(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css) %>
<% require css(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css) %>
<% require javascript(https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js) %>

<%-- Slick settings --%>
<script type="text/javascript">
$( '.kbslideshow' ).slick({

    dots: false,
    speed: 300

});
</script>