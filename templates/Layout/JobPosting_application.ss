<% require css(job_postings/css/Applicant.css) %>
<% require javascript(job_postings/javascript/applicant.js) %>

<div class="typography">
	<div id="ledger">
		<a href="{$Top.Link}applicants/">$Top.Title Applicants</a>
	</div>
	<br class="fix" />
	<% if Applicant %>
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
		<div class="controls">
			<div class="actions">
				<a href="{$Top.Link}printApplicant/$ID" class="print first" target="_blank">Print Application</a>
				<div class="delete">
					<a href="#" class="del-click">Delete Application</a>
					<div class="double-check">
					<a href="{$Top.Link}deleteApplication/$ID" class="yes">Delete</a>
					<a href="#" class="cancel">Cancel</a>
					<br class="fix" />
					</div>
				</div>
			</div>
			<% if Resume %>
			<a class="resume" href="$Resume.URL">
				<h5>{$FirstName}'s Resume</h5>
				<img src="/job_postings/images/file_download-128.png" alt="Download $FirstName {$LastName}'s resume." />
			</a>
			<% else %>
			<img class="resume no-resume" src="/job_postings/images/file_download-128-off.png" alt="No resume uploaded" />
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