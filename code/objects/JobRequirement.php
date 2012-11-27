<?php 

class JobRequirement extends JobDetail {
	
	static $belongs_many_many = array(
		'Jobs' => 'Job'
	);
	
	static $singular_name = 'Requirement';
	static $plural_name = 'Requirements';
}