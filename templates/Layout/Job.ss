$Breadcrumbs

<h2 class="page-title">$Parent.MenuTitle</h2>

<ul class="columns columns-2 responsive-50 main-columns">
    <li class="column-row main-content article">
        <article>
            <div><b>$Date.Format(F j Y)</b></div>
            
            <h2 class="detail-head">$Title</h2>
            
            <% if SubHeadline %><h3 class="detail-subhead">$SubHeadline</h3><% end_if %>
            
            <!--<ul class="collapse divider">
                <li><a href="#">James Grunewald</a></li>
                <li><a href="#">Email Article</a></li>
                <li><a href="#">Print Article</a></li>
                <li><a href="#">Share Article</a></li>
            </ul>-->
            
            $ShareIcons
            
            <p><button type="submit" onclick="parent.location='{$Link}apply'">Apply for this Job</button></p>
            
			<div class="typography">
				$Content
			</div>   
			
			<% cached URLSegment, LastEdited %>   
			      
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
			            
			<% end_cached %>
			
            <% include JobDetail %>
            
        </article>
    </li>
    <li class="aside-content">
        <h2 class="section-title">$Parent.MenuTitle</h2>
        
        <% control Parent %>
        	<% include JobSideBar %>
        <% end_control %>
        
        <% include ContactInfo %>
    
    </li>
</ul>