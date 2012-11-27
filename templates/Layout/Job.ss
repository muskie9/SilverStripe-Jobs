<div class="content-container">	
	<article>
		$BreadCrumbs
		<h1>$Title</h1>
            
        <% include JobDetail %> 
           
        <p class="clearfix"><button type="submit" onclick="parent.location='{$Link}apply'">Apply for this Job</button></p>
                
		<div class="content">
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
            
	</article>
	
	<section>
		$Form
		$PageComments
	</section>	
</div>
<% with Parent %>
<% include JobSideBar %>
<% end_with %>