<?php

class Job extends Page{
	
	static $db = array(
		//'Category' => "Enum('Design, Development, Project Management, Writing, IA')",
		'PositionType' => "Enum('Full-time, Part-time, Freelance, Internship')",
		'PostDate' => 'Date',
                'CloseDate' => 'Date',
		'Experience' => 'Varchar(200)'
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
	
	public function populateDefaults() {
	    $this->PostDate = date('Y-m-d');
	    parent::populateDefaults();
	}
	
	static $description = 'Job Detail Page';
	
	public function getCMSFields(){
						
		$fields = parent::getCMSFields();
		
		// calendar fields
		$PostDate = DateField::create('PostDate', 'Position Post Date')
			->setConfig('showcalendar', true)
			->setConfig('dateformat', 'MMM dd, YYYY');

                $CloseDate = DateField::create('CloseDate', 'Position Close Date')
			->setConfig('showcalendar', true)
			->setConfig('dateformat', 'MMM dd, YYYY');
		
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
			DropdownField::create('PositionType', 'Position Type', singleton('Job')->dbObject('PositionType')->enumValues())
				->setEmptyString('--select--'),
			$PostDate,
                        $CloseDate,
			$CategoryField
		));
		
		/*
		$fields->addFieldsToTab('Root.Details', array(
			$ResponsibilityField,
			$RequirementsField,
			$SkillsField
		));
		*/
		
		return $fields;
	}
	
	// Dates
	public function getPosted() {
		//if ($this->PostDate) return $this->obj('PostDate')->Format('M n, Y');
		if ($this->PostDate) return $this->obj('PostDate')->NiceUS();
		return false;
	}
	
	// Apply Button
	public function getApplyButton() {
		if ($this->CloseDate) {
			if ($this->CloseDate > Date('Y-m-d')) {
				$apply = '<p><button type="submit" onclick="parent.location=\'' . $this->Link() . 'apply\'">Apply for this position</button>';
				if($this->parent()->Application()->ID!=0){
					$download = $this->parent()->Application()->URL;
					$apply.=" or <a href=\"$download\" target=\"_blank\">Download the Application</a>";
				}
				$apply.="</p>";
				return $apply;
			} else {
				return '<p><b>No longer accepting applications for this position</b></p>';
			}	
		}
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
	
	public function ApplicationLink(){
		return $this->parent()->Application()->URL;
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

		$Form->Fields()->insertBefore(ReadOnlyField::create('PositionName', 'Position', $this->getTitle()), 'Available');
		$Form->Fields()->push(HiddenField::create('JobID', 'JobID', $this->ID));
		
		$page = $this->customise(array(
			'Form' => $Form
		))/*->renderWith(array('Page', 'Page'))*/;
		
		return $page;

	}
	
	public function JobApp() {
	
		$App = singleton('JobSubmission');
		
		$fields = $App->getFrontEndFields();
		
		//debug::show($fields);
		
		$actions = FieldList::create(
			new FormAction('doApply', 'Apply')
		);
		
		$required = $App->getRequiredFields();
		/*
		$required = new RequiredFields(array(
			'FirstName',
			'LastName',
			'Email',
			'Phone',
			//'Resume'
		));
		*/
		
		return Form::create($this, "JobApp", $fields, $actions, $required);
			//->addWell()
			//->setLayout("horizontal");
		
	}
	
	public function doApply($data, $form){
	
		$entry = new JobSubmission();
		$form->saveInto($entry);
		
		$entry->JobID = $this->ID;
		
        if($entry->write()){
	        $to = $this->parent()->EmailRecipient;
	        $from = $this->parent()->FromAddress;
	        $subject = $this->parent()->EmailSubject;
	        $body = $this->parent()->EmailMessage;
	        
	        $email = new Email($from,$to,$subject,$body);
	        $email->setTemplate('JobSubmission');
	        
	        $email->populateTemplate(
	        	JobSubmission::get()
	        	->byID($entry->ID)
	        );
	        
	        //debug::show($email);
	        
	        $email->send();
	        
	        $this->redirect(Controller::join_links($this->Link(), 'complete'));
        }
	
	}
	
	public function complete() {
		return $this->customise(array());
	}
	
}
