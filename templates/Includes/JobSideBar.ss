<aside>
	<% if CategoryList %>
	    <h3>Categories</h3>
	    <ul>    	
	    	<% control CategoryList %>
	        <li><a href="{$Top.Link}category/$Category/">$Category</a> ($JobCount)</li>
	        <% end_control %>
	    </ul>
	<% end_if %>
	<p>&nbsp;</p>
    <h3>Types</h3>
    <ul>
    	<% control JobTypeList %>
        <li><a href="{$Top.Link}type/$Type/">$Type</a> ($JobCount)</li>
        <% end_control %>
    </ul>
</aside>