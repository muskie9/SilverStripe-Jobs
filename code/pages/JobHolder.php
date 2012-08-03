<?php

class JobHolder extends Page{
	
	static $has_many = array(

	);
	
	public function getCMSFields(){
			
		$fields = parent::getCMSFields();
		
		return $fields;
	}
	
	static $allowed_children = array(
		'Job'
	);
	
	public static $singular_name = "Job Group";
	public static $plural_name = "Job Groups";
	
	static $description = 'Jobs Landing Page';
	
	public function getCategoryList() {
		$Cats = JobCategory::get();
		
		$doSet = new ArrayList();
		foreach ($Cats as $cat) {
			$doSet->push(new ArrayData(array(
				'Category' => $cat->Name,
				'JobCount' => $cat->Jobs("CloseDate > '" . date('Y-m-d') . "' AND StartDate < '" . date('Y-m-d') . "'")->Count()
			)));
		}
		return $doSet;
	}
	
	public function getJobTypeList() {
		$JobTypes = singleton('Job')->dbObject('PositionType')->enumValues();
		
		$doSet = new ArrayList(); 
		foreach(singleton('Job')->dbObject('PositionType')->enumValues() as $type) { 
			$doSet->push(new ArrayData(array( 
				'Type' => $type, 
				'JobCount' => DataObject::get("Job","PositionType = '$type' AND CloseDate > '" . date('Y-m-d') . "' AND StartDate < '" . date('Y-m-d') . "'")->Count()
			))); 
		}
		
		//debug::show($doSet);
		return $doSet;
	}
	
}

class JobHolder_Controller extends Page_Controller{
	
	function index($request) {
		return $this->render(array(
			'Cat' => false
		));
	}
	
	public function Results() {
		return Job::get()
			->filter(array('CloseDate:GreaterThan' => date('Y-m-d'), 'StartDate:LessThan' => date('Y-m-d')))
			->sort('StartDate DESC');		
	}
	
	// filter by job category
	public function category() {
		
		// get ID from url params
		$cat = 0;
		$Params = $this->getURLParams();
		if($Params['ID']) {
			$cat = $Params['ID'];
			$cat = Convert::raw2sql($cat);
		}
		
		if ($cat) {
			if ($Category = JobCategory::get()->filter('Name', $cat)->First()) {
				$Results = $Category->Jobs()
					->filter(array('CloseDate:GreaterThan' => date('Y-m-d'), 'StartDate:LessThan' => date('Y-m-d')))
					->sort('StartDate DESC');
				$CategoryName = $Category->Name;
			} else {
				$Results = false;
				$CategoryName = $cat;
				//debug::show($Category);
			}
		
			return $this->render(array(
				'Results' => $Results,
				'Cat' => $CategoryName
			));
		}
			
	}
	
	// fiter by job type
	public function type() {
		
		// get ID from url params
		$type = 0;
		$Params = $this->getURLParams();
		if($Params['ID']) {
			$type = $Params['ID'];
			$type = Convert::raw2sql($type);
		}
		
		if ($type) {
			$Results = Job::get()
				->filter(array('PositionType' => $type, 'CloseDate:GreaterThan' => date('Y-m-d'), 'StartDate:LessThan' => date('Y-m-d')))
				->sort('StartDate DESC');
		
			return $this->render(array(
				'Results' => $Results,
				'Type' => $type
			));
		}
	}
	
}