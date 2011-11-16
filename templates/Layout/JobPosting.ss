<% require css(job_postings/css/JobPosting.css) %>
<% require javascript(job_postings/javascript/jquery.validate.min.js) %>
<% require javascript(job_postings/javascript/form_init.js) %>
<% if getCheck %>
<% require javascript(job_postings/javascript/form-override.js) %>
<% end_if %>


<div class="typography">
	$Breadcrumbs
	<br />
	<h2>$Title</h2>
	<% if SecCheck %>
	<a class="applicants" href="{$Link}applicants/">Applicants</a>
	<% end_if %>
	<br class="fix" />
	<% if IsSuccess && SubmitText %>
	$SubmitText
	<% else %>
	$Content
	<a href="#" id="Apply">Apply Online!</a>
	$ApplicationForm
	<% end_if %>
</div>
<div id="hidden"></div>