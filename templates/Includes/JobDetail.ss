<ul class="collapse divider divider-repeat">
    <li class="label">CATEGORY:</li>
    <% cached URLSegment, 'job-categories', LastEdited %>
	    <% loop Categories %>
	    	<li><a href="{$Top.Link}category/$Name/">$Name</a></li>
	    <% end_loop %>
    <% end_cached %>
    <li class="label">TYPE:</li>
    <li><a href="{$Parent.Link}type/$PositionType/">$PositionType</a></li>
    <li class="label">CLOSES:</li>
    <li>$CloseDate.Format(F j Y)</li>
</ul>