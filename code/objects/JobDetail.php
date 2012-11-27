<?php

class JobDetail extends DataObject {
	
	static $db = array(
		'Name' => 'Varchar(255)',
		'Content' => 'Text'
	);
	
	static $many_many = array(
		'Categories' => 'JobCategory'
	);
	
	static $default_sort = 'Name';
	
	static $summary_fields = array(
		'Name' => 'Name',
		'Content' => 'Content'
	);
	
	static $searchable_fields = array(
		'Name',
		'Content',
		'Categories.ID' => array(
			'title' => 'Category'
		)
	);
	
	public function getCMSFields() {
		
		$fields = FieldList::create(
			TextField::create('Name'),
			TextareaField::create('Content')
		);
		
		if ($this->ID) $fields->push(CheckboxSetField::create('Categories', 'Categories', JobCategory::get()->map()));
		
		return $fields;
		
	}
	
}