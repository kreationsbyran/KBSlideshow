<% if $Slides %>
    <div class="kbslideshow">

    <% loop $Slides %>

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
    <% end_loop %> <%-- / $Slides --%>

</div>

<% include Slick %>

<% end_if %> <%-- / $Slides --%>