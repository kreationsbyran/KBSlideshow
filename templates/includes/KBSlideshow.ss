<% if $Slides %>
    <div class="KBSlideshow">

    <% loop $Slides %>
        <div class="KBSlide">

        <% if $Image %>
            <img src="$Image.URL" alt="" />
        <% end_if %> <%-- / $Image --%>

        <% if $Title %>
            <h1>$Title</h1>
        <% end_if %> <%-- / $Title --%>

        <% if $Text %>
            <p>$Text</p>
        <% end_if %> <%-- / $Text --%>

        </div>
    <% end_loop %> <%-- / $Slides --%>

</div>
<% end_if %> <%-- / $Slides --%>