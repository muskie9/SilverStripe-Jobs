<% require css(job_postings/css/JobHolder.css) %>

<div class="typography">
	<% if Children %>
	<ul id="jobs-list">
	<% control Children %>
		<li<% if FirstLast %> class="$FirstLast"<% end_if %>>
			<h3><a href="$Link">$Title</a></h3>
			<p>$Content.LimitWordCount(30)</p>
			<a href="$Link">Read More &gt;&gt;</a> | <a href="{$Link}?form-toggle=show#Form_ApplicationForm">Apply Online</a>
		</li>
	<% end_control %>
	</ul>
	<% end_if %>
</div>