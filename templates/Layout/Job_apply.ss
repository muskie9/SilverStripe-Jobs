<style type="text/css">
#content form label
{
display: block;
padding-bottom: 5px;
}

#content form li { margin-bottom: 12px; }
</style>

$Breadcrumbs

<h2 class="page-title">$Parent.MenuTitle</h2>

<% if SubHeadline %><h3 class="detail-subhead">$SubHeadline</h3><% end_if %>

<ul class="columns columns-2 responsive-50 main-columns">
    <li class="column-row main-content">
        <article>
            <div><b>$Date.Format(F j Y)</b></div>
            
            <h2 class="detail-head">$Title</h2>
            
            <% include JobSummary %>
			<% include JobDetail %>
			
			<h3 class="detail-subhead">Apply Online</h3>
			
			<p>Please complete the form below to apply for this position.</p>
			
			$Form
			
            
        </article>
    </li>
    <li class="aside-content">
        <h2 class="section-title">$Parent.MenuTitle</h2>
        
        <% control Parent %>
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
        <% end_control %>
        
        <% include ContactInfo %>
    
    </li>
</ul>