<% require css(job_postings/css/Print.css) %>

<div class="typography">
	<% if Applicant && SecCheck %>
	<% control Applicant %>
	<div id="Applicant">
		<div class="info">
			<h2>$FirstName $LastName</h2>
			<% if Email || Phone %>
			<p><% if Email %>Email: <a href="mailto:$Email">$Email</a><% end_if %>
			<% if Email && Phone %><br /><% end_if %>
			<% if Phone %>Phone: $Phone<% end_if %></p>
			<% end_if %>
			<% if Bio %>
			<p>$Bio</p>
			<% end_if %>
		</div>
		<br class="fix" />
	</div>
	<% end_control %>
	<% else %>
	<h2>$Title</h2>
	$Content
	<% end_if %>
</div>