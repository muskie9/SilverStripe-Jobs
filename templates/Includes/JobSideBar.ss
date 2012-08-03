<% cached 'jobsidebar', List(Job).max(LastEdited) %>
	<div class="aside-content-box list">
	    <h3>Categories</h3>
	    <ul>
	    	<% control CategoryList %>
	        <li><a href="{$Top.Link}category/$Category/">$Category</a> ($JobCount)</li>
	        <% end_control %>
	    </ul>
	</div>
	
	<div class="aside-content-box list">
	    <h3>Types</h3>
	    <ul>
	    	<% control JobTypeList %>
	        <li><a href="{$Top.Link}type/$Type/">$Type</a> ($JobCount)</li>
	        <% end_control %>
	    </ul>
	</div>
<% end_cached %>