<aside>
	<% if CategoryList %>
	    <h3>Categories</h3>
	    <ul>    	
	    	<% loop CategoryList %>
	        <li><a href="{$Top.Link}category/$Category/">$Category</a> ($JobCount)</li>
	        <% end_loop %>
	    </ul>
	<% end_if %>

    <h3>Types</h3>
    <ul>
    	<% loop JobTypeList %>
        <li><a href="{$Top.Link}type/$Type/">$Type</a> ($JobCount)</li>
        <% end_loop %>
    </ul>
</aside>