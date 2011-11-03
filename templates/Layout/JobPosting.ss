<% require css(job_postings/css/JobPosting.css) %>
<% require javascript(job_postings/javascript/jquery.validate.min.js) %>
<% require javascript(job_postings/javascript/form_init.js) %>


<div class="typography">
	<h2>$Title</h2>
	<% if IsSuccess && SubmitText %>
	$SubmitText
	<% else %>
	$Content
	<a href="#" id="Apply">Apply Online!</a>
	$ApplicationForm
	<% end_if %>
</div>