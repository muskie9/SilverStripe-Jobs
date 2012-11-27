<?php 

class JobResponsibility extends JobDetail {
	
	static $belongs_many_many = array(
		'Jobs' => 'Job'
	);
	
	static $singular_name = 'Responsibility';
	static $plural_name = 'Responsibilities';
}