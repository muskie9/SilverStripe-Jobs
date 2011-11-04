<% require css(job_postings/css/Applicant.css) %>
<% require javascript(job_postings/javascript/applicant.js) %>

<div class="typography">
	<div id="ledger">
		<a href="{$Top.Link}applicants/">$Top.Title Applicants</a>
	</div>
	<br class="fix" />
	<% if SecCheck %>
	<div id="Applicant">
		<h2>$Applicant.FirstName $Applicant.LastName</h2>
		<p>$Applicant.FirstName {$Applicant.LastName}'s application has successfully been deleted. <a href="{$Top.Link}applicants/">Browse other applicants</a></p>
	</div>
	<% else %>
	<h2>$Title</h2>
	$Content
	<% end_if %>
</div>