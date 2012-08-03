<?php

class Job extends Page{
	
	static $db = array(
		//'Category' => "Enum('Design, Development, Project Management, Writing, IA')",
		'PositionType' => "Enum('Full-time, Part-time, Freelance, Internship')",
		'StartDate' => 'Date',
		'CloseDate' => 'Date'
	);
	
	static $has_many = array(
		'Submissions' => 'JobSubmission'
	);
	
	static $many_many = array(
		'Categories' => 'JobCategory',
		'Requirements' => 'JobRequirement',
		'Skills' => 'JobSkill',
		'Responsibilities' => 'JobResponsibility'
	);
	
	static $many_many_extraFields = array(
		'Requirements' => array(
			'SortOrder' => 'Int'
		),
		'Skills' => array(
			'SortOrder' => 'Int'
		),
		'Responsibilities' => array(
			'SortOrder' => 'Int'
		)
	);
	
	static $description = 'Job Detail Page';
	
	public function getCMSFields(){
						
		$fields = parent::getCMSFields();
		
		// calendar fields
		$StartDate = new DateField('StartDate');
		$StartDate->setConfig('showcalendar', true);
		
		$CutOffDate = new DateField('CloseDate');
		$CutOffDate->setConfig('showcalendar', true);
		
		// Categories
	    $CategoryField = new CheckboxSetField('Categories', 'Categories', JobCategory::get()->map('ID', 'Name'));
	    
	    // Requirements
	    $gridFieldConfig = GridFieldConfig_RelationEditor::create()
	    	->addComponents(new GridFieldSortableRows('SortOrder'));
	    $gridFieldConfig->getComponentByType('GridFieldAddExistingAutocompleter')->setSearchFields(array('Name', 'Content'));
	    $RequirementsField = new GridField("Requirements", "Requirements", $this->Requirements()->sort('SortOrder'), $gridFieldConfig);
	    
	    // Skills
	    $gridFieldConfig = GridFieldConfig_RelationEditor::create()
	    	->addComponents(new GridFieldSortableRows('SortOrder'));
	    $gridFieldConfig->getComponentByType('GridFieldAddExistingAutocompleter')->setSearchFields(array('Name', 'Content'));
	    $SkillsField = new GridField("Skills", "Skills", $this->Skills()->sort('SortOrder'), $gridFieldConfig);
	    
	    // Responsibilities
	    $gridFieldConfig = GridFieldConfig_RelationEditor::create()
	    	->addComponents(new GridFieldSortableRows('SortOrder'));
	    $gridFieldConfig->getComponentByType('GridFieldAddExistingAutocompleter')->setSearchFields(array('Name', 'Content'));
	    $ResponsibilityField = new GridField("Responsibilities", "Responsibilities", $this->Responsibilities()->sort('SortOrder'), $gridFieldConfig);
		
		$fields->addFieldsToTab("Root.Job", array(
			new DropdownField('PositionType', 'Position Type', singleton('Job')->dbObject('PositionType')->enumValues()),
			$StartDate,
			$CutOffDate,
			$CategoryField
		));
		
		$fields->addFieldsToTab('Root.Details', array(
			$ResponsibilityField,
			$RequirementsField,
			$SkillsField
		));
		
		return $fields;
	}
	
	// return Requirements in order
	public function getRequirementList() {
		return $this->Requirements()->sort('SortOrder');
	}
	
	// return Skills in order
	public function getSkillList() {
		return $this->Skills()->sort('SortOrder');
	}
	
	// return Responsibilities in order
	public function getResponsibilityList() {
		return $this->Responsibilities()->sort('SortOrder');
	}
	
	//static $can_be_root = false;
	
}

class Job_Controller extends Page_Controller{
	
	public function init() {
		parent::init();
		
		Requirements::css('jobs/css/job.css');
		
	}
	
	public function apply() {
	
		$Form = $this->JobApp();
		
		$page = $this->customise(array(
			'Form' => $Form
		))/*->renderWith(array('Page', 'Page'))*/;
		
		return $page;

	}
	
	public function JobApp() {
		
		$fields = singleton('JobSubmission')->getFrontEndFields();
		
		$actions = FieldList::create(
			new FormAction('doApply', 'Apply')
		);
		
		$required = new RequiredFields(array(
			'FirstName',
			'LastName',
			'Email',
			'Phone',
			//'Resume'
		));
		
		return Form::create($this, "JobApp", $fields, $actions, $required);
			//->addWell()
			//->setLayout("horizontal");
		
	}
	
	public function doApply($data, $form) {
	
		$entry = new JobSubmission();
		$form->saveInto($entry);
		
		$entry->JobID = $this->ID;
		
        $entry->write();
        
        $this->redirect(Controller::join_links($this->Link(), 'complete'));
	
	}
	
	public function complete() {
		return $this->customise(array());
	}
	
}