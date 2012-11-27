<?php 

class JobSkill extends JobDetail {
	
	static $belongs_many_many = array(
		'Jobs' => 'Job'
	);
	
	static $singular_name = 'Skill';
	static $plural_name = 'Skills';
}