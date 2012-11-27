<div class="content-container">	
	<section>
		<h1>$Title</h1>
		
		<% if Cat %>
			<h3 class="filter">$Cat Jobs</h3>
		<% else_if Type %>
			<h3 class="filter">$Type Jobs</h3>
		<% end_if %>
    
    	<% if Results %>     
	        <% control Results %>
	        <article>
	            <div><b>$StartDate.Format(F j Y)</b></div>
	            
	            <h2><a href="$Link">$Title</a></h2>
	            
	            <% include JobSummary %>
	            
	            <% include JobDetail %>
	            
	        </article>
	        <% end_control %>
	    <% else %>
	    	<p>No postings at this time, please check back soon.</p>
        <% end_if %>
	</section>
	<section>
		$Form
		$PageComments
	</section>	
</div>
<% include JobSideBar %>