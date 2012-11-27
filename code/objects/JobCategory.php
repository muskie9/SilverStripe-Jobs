<?php

class JobCategory extends DataObject {
	
	static $db = array(
		'Name' => 'Varchar(255)'
	);
	
	static $belongs_many_many = array(
		'Jobs' => 'Job',
		'Details' => 'JobDetail'
	);
	
	static $singular_name = "Category";
	static $plural_name = "Categories";
	
	static $default_sort = "Name";
	
}