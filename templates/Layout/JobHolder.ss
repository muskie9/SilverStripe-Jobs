$Breadcrumbs

<h2 class="page-title">$MenuTitle</h2>

<ul class="columns columns-2 responsive-50 main-columns">
    <li class="column-row main-content article">   
    
    	<% if SubHeadline %><h3 class="detail-subhead">$SubHeadline</h3><% end_if %>
    	
    	<div class="typography">
    		$Content
    	</div>
    
    	<% cached URLSegment, Cat, Type, List(Job).max(LastEdited) %>
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
		            
		            <!--<ul class="collapse divider">
		                <li><a href="#">James Grunewald</a></li>
		                <li><a href="#">Email Article</a></li>
		                <li><a href="#">Print Article</a></li>
		                <li><a href="#">Share Article</a></li>
		            </ul>-->
		            
		            <p>
		            	$Content.FirstParagraph(text)
		            </p>
		            
		            <p><a href="$Link">LEARN MORE</a></p>
		            
		            <% include JobDetail %>
		            
		        </article>
		        <% end_control %>
		    <% else %>
		    	<p>No postings at this time, please check back soon.</p>
	        <% end_if %>
             
         <% end_cached %>
         
    </li>
    <li class="aside-content">
        <h2 class="section-title">$MenuTitle</h2>
        
        <% include JobSideBar %>
        
        <% include ContactInfo %>
    </li>
</ul>