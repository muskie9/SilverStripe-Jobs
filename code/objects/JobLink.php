<?php

class JobLink extends DataObject {
	
	static $db = array(
		'Name' => 'Varchar(255)',
		'URL' => 'Varchar(255)'
	);
	
	static $has_one = array(
		'Submission' => 'JobSubmission'
	);
	
	static $singular_name = 'Link';
	static $plural_name = 'Links';
	
	static $default_sort = 'Name';
	
	static $summary_fields = array(
		'Name' => 'Name',
		'URL' => 'URL'
	);
}