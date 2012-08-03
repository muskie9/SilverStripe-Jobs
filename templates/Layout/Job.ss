$Breadcrumbs

<h2 class="page-title">$Parent.MenuTitle</h2>

<ul class="columns columns-2 responsive-50 main-columns">
    <li class="column-row main-content article">
        <article>
            <div><b>$Date.Format(F j Y)</b></div>
            
            <h2 class="detail-head">$Title</h2>
            
            <% if SubHeadline %><h3 class="detail-subhead">$SubHeadline</h3><% end_if %>
            
            <ul class="collapse divider">
                <li><a href="#">James Grunewald</a></li>
                <li><a href="#">Email Article</a></li>
                <li><a href="#">Print Article</a></li>
                <li><a href="#">Share Article</a></li>
            </ul>
            $ShareIcons
            
            <p><button type="submit" onclick="parent.location='{$Link}apply'">Apply for this Job</button></p>
            
			<div class="typography">
				$Content
			</div>      
			      
			<% if ResponsibilityList %>
			<h3>Responsibilities</h3>
			<ul>
				<% control ResponsibilityList %>
				<li>$Content</li>
				<% end_control %>
			</ul>
			<% end_if %>
			
			<% if RequirementList %>
			<h3>Requirements</h3>
			<ul>
				<% control RequirementList %>
				<li>$Content</li>
				<% end_control %>
			</ul>
			<% end_if %>
			
			<% if SkillList %>
			<h3>Skills</h3>
			<ul>
				<% control SkillList %>
				<li>$Content</li>
				<% end_control %>
			</ul>
			<% end_if %>
			            
            <% include JobDetail %>
            
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