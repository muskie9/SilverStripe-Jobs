<ul class="collapse divider divider-repeat">
    <% if Categories %>
    <li class="label">CATEGORY:</li>
	    <% loop Categories %>
	    	<li><a href="{$Top.Link}category/$Name/">$Name</a></li>
	    <% end_loop %>
	<% end_if %>
    <li class="label">TYPE:</li>
    <li><a href="{$Parent.Link}type/$PositionType/">$PositionType</a></li>
    <% if Posted %>
    	<li class="label">POSTED:</li>
    	<li>$Posted</li>
    <% end_if %>
</ul>