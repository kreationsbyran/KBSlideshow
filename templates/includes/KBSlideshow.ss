<% if $KBSlides %>
    <div class="kbslideshow">

    <% loop $KBSlides %>
        <div class="kbslide">

        <% if $KBImage %>
            <img src="$KBImage" alt="" />
        <% end_if %> <%-- / $KBImage --%>

        <% if $Title %>
            <h1>$Title</h1>
        <% end_if %> <%-- / $Title --%>

        <% if $Text %>
            <p>$Text</p>
        <% end_if %> <%-- / $Text --%>

        </div>
    <% end_loop %> <%-- / $KBSlides --%>

</div>

<% include KBSlick %>

<% end_if %> <%-- / $KBSlides --%>