<?php

class JobAdmin extends ModelAdmin {
	public static $managed_models = array(
		'JobSubmission',
		'JobCategory',
		'JobResponsibility',
		'JobRequirement',
		'JobSkill'
	);
	
	static $url_segment = 'jobs';
	
	static $menu_title = 'Jobs';
	
}