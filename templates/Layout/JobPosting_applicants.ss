<% require css(job_postings/css/Applicants.css) %>

<div class="typography">
	<% if anyApps %>
	<a href="$Top.Link" class="back">$Top.MenuTitle</a>
	<h2>$Title ($Applicants.Count)</h2>
	<ul id="Applicants">
		<% control Applicants %>
		<li <% if FirstLast %>class="$FirstLast"<% end_if %>>
			<div class="info compensate">
				<h3><a href="{$Top.Link}application/$ID">$FirstName $LastName</a></h3>
				<% if Email || Phone %>
				<p><% if Email %>Email: <a href="mailto:$Email">$Email</a><% end_if %>
				<% if Email && Phone %><br /><% end_if %>
				<% if Phone %>Phone: $Phone<% end_if %></p>
				<% end_if %>
				<% if Bio %>
				<p>$Bio.LimitWordCount(20)<br /><a href="{$Top.Link}application/$ID">View full application</a></p>
				<% end_if %>
			</div>
			<% if Resume %>
			<a class="resume" href="$Resume.URL">
				<img src="/job_postings/images/file_download-128.png" alt="Download {$FirstName}'s resume" />
				<br />
				Download<br />{$FirstName}'s resume
			</a>
			<% else %>
			<div class="resume no-resume">
				<img src="/job_postings/images/file_download-128-off.png" alt="No Download Available" />
			</div>
			<% end_if %>
			<br class="fix" />
		</li>
		<% end_control %>
	</ul>
	<% else %>
		<% if secCheck %>
		<a href="$Top.Link" class="back">$Top.MenuTitle</a>
		<% end_if %>
		<h2>$Title</h2>
		<p>There are currently no applications for this position.</p>
	<% end_if %>
</div>