<?php

class AlaarkSubmission extends JobSubmission {

	static $db = array(
		'Address' => 'Varchar(200)',
		'City' => 'Varchar(200)',
		'State' => 'Varchar(100)',
		'PostalCode' => 'Varchar(10)',
		'PAddress' => 'Varchar(255)',
		'PCity' => 'Varchar(200)',
		'PState' => 'Varchar(100)',
		'PPostalCode' => 'Varchar(10)',
		'ReferredBy' => 'Varchar(255)',
		
		'Salary' => 'Varchar(10)',
		'Employed' => 'Enum("yes, no")',
		'InquireEmployer' => 'Enum("yes, no")',
		'AppliedBefore' => 'Enum("yes, no")',
		'AppliedWhere' => 'Varchar(200)',
		'AppliedWhen' => 'Varchar(200)',
		
		'GName' => 'Varchar(200)',
		'GYears' => 'Varchar(200)',
		'GGrad' => 'Enum("yes,no")',
		'GSubjects' => 'Varchar(200)',
		
		'HName' => 'Varchar(200)',
		'HYears' => 'Varchar(200)',
		'HGrad' => 'Enum("yes,no")',
		'HSubjects' => 'Varchar(200)',
		
		'CName' => 'Varchar(200)',
		'CYears' => 'Varchar(200)',
		'CGrad' => 'Enum("yes,no")',
		'CSubjects' => 'Varchar(200)',
		
		'TName' => 'Varchar(200)',
		'TYears' => 'Varchar(200)',
		'TGrad' => 'Enum("yes,no")',
		'TSubjects' => 'Varchar(200)',
		
		'SpecialStudy' => 'Text',
		'Military' => 'Varchar(255)',
		'Rank' => 'Varchar(50)',
		
		'E1From' => 'Varchar(10)',
		'E1To' => 'Varchar(10)',
		'E1Company' => 'Varchar(255)',
		'E1Salary' => 'Varchar(20)',
		'E1Position' => 'Varchar(50)',
		'E1Leaving' => 'Varchar(50)',
		
		'E2From' => 'Varchar(10)',
		'E2To' => 'Varchar(10)',
		'E2Company' => 'Varchar(255)',
		'E2Salary' => 'Varchar(20)',
		'E2Position' => 'Varchar(50)',
		'E2Leaving' => 'Varchar(50)',
		
		'E3From' => 'Varchar(10)',
		'E3To' => 'Varchar(10)',
		'E3Company' => 'Varchar(255)',
		'E3Salary' => 'Varchar(20)',
		'E3Position' => 'Varchar(50)',
		'E3Leaving' => 'Varchar(50)',
		
		'E4From' => 'Varchar(10)',
		'E4To' => 'Varchar(10)',
		'E4Company' => 'Varchar(255)',
		'E4Salary' => 'Varchar(20)',
		'E4Position' => 'Varchar(50)',
		'E4Leaving' => 'Varchar(50)',
		
		'R1Name' => 'Varchar(200)',
		'R1Address' => 'Varchar(255)',
		'R1Business' => 'Varchar(200)',
		'R1Years' => 'Varchar(20)',
		
		'R2Name' => 'Varchar(200)',
		'R2Address' => 'Varchar(255)',
		'R2Business' => 'Varchar(200)',
		'R2Years' => 'Varchar(20)',
		
		'R3Name' => 'Varchar(200)',
		'R3Address' => 'Varchar(255)',
		'R3Business' => 'Varchar(200)',
		'R3Years' => 'Varchar(20)'
				
	);
	
	static $summary_fields = array(
		//'ViewLink' => 'View Application',
		'Name' => 'Applicant',
		'CreatedLabel' => 'Date',
		
		'Address' => 'Present Address',
		'City' => 'Present City',
		'State' => 'Present State',
		'PostalCode' => 'Present Zip Code',
		
		'PAddress' => 'Permanent Address',
		'PCity' => 'Permanent City',
		'PState' => 'Permanent State',
		'PPostalCode' => 'Permanent Zip Code',
		
		'Email' => 'Email',
		'Phone' => 'Phone',
		'ReferredBy' => 'Referred By',
		
		'Job.Title' => 'Position Desired',
		'Salary' => 'Salary Desired',
		'Employed' => 'Currently Employed',
		'InquireEmployer' => 'Inquire Current Employer',
		'AppliedBefore' => 'Applied Before',
		'AppliedWhere' => 'Where Applied',
		'AppliedWhen' => 'When Applied',
		
		'GName' => 'Grammar School',
		'GYears' => 'Grammar School Years Attended',
		'GGrad' => 'Grammar School Graduated',
		'GSubjects' => 'Grammar School Subjects',
		
		'HName' => 'High School',
		'HYears' => 'High School Years Attended',
		'HGrad' => 'High School Graduated',
		'HSubjects' => 'High School Subjects',
		
		'CName' => 'College',
		'CYears' => 'College Years Attended',
		'CGrad' => 'College Graduated',
		'CSubjects' => 'College Subjects',
		
		'TName' => 'Trade School',
		'TYears' => 'Trade School Years Attended',
		'TGrad' => 'Trade School Graduated',
		'TSubjects' => 'Trade School Subjects',
		
		'SpecialStudy' => 'Special Study',
		'Military' => 'Military',
		'Rank' => 'Military Rank',
		
		'E1From' => 'Employer 1 From',
		'E1To' => 'Employer 1 To',
		'E1Company' => 'Employer 1',
		'E1Salary' => 'Employer 1 Salary',
		'E1Position' => 'Employer 1 Position',
		'E1Leaving' => 'Employer 1 Left',
		
		'E2From' => 'Employer 2 From',
		'E2To' => 'Employer 2 To',
		'E2Company' => 'Employer 2',
		'E2Salary' => 'Employer 2 Salary',
		'E2Position' => 'Employer 2 Position',
		'E2Leaving' => 'Employer 2 Left',
		
		'E3From' => 'Employer 3 From',
		'E3To' => 'Employer 3 To',
		'E3Company' => 'Employer 3',
		'E3Salary' => 'Employer 3 Salary',
		'E3Position' => 'Employer 3 Position',
		'E3Leaving' => 'Employer 3 Left',
		
		'E4From' => 'Employer 4 From',
		'E4To' => 'Employer 4 To',
		'E4Company' => 'Employer 4',
		'E4Salary' => 'Employer 4 Salary',
		'E4Position' => 'Employer 4 Position',
		'E4Leaving' => 'Employer 4 Left',
		
		'R1Name' => 'Reference 1',
		'R1Address' => 'Reference 1 Address',
		'R1Business' => 'Reference 1 Business',
		'R1Years' => 'Reference 1 Years Known',
		
		'R2Name' => 'Reference 2',
		'R2Address' => 'Reference 2 Address',
		'R2Business' => 'Reference 2 Business',
		'R2Years' => 'Reference 2 Years Known',
		
		'R3Name' => 'Reference 3 ',
		'R3Address' => 'Reference 3 Address',
		'R3Business' => 'Reference 3 Business',
		'R3Years' => 'Reference 3 Years Known',
	);
	
	/*protected function getViewLink(){
		return "<a href=\"/utility-2/jobs/application/".$this->ID."\">View</a>";
	}*/
	
	public function getFrontEndFields($params = null) {
		
		$fields = parent::getFrontEndFields();
		
		// remove fields
		$fields->removeByName('Resume');
		$fields->removeByName('Message');
		
		// add custom fields
		$fields->insertBefore(LiteralField::create('SubTitle', '<p>Pre-Employment Questionnaire. Equal Opportunity Employer</p>'), 'FirstName');
		$fields->insertBefore(HeaderField::create('Personal', 'Personal Information', 3), 'FirstName');
		$fields->insertBefore(HeaderField::create('Present', 'Present Address', 4), 'Email');
		$fields->insertBefore(TextField::create('Address'), 'Email');
		$fields->insertBefore(TextField::create('City'), 'Email');
		$fields->insertBefore(DropdownField::create('State', 'State', $this->StatesList())
			->setEmptyString('--select--'), 'Email');
		$fields->insertBefore(TextField::create('PostalCode', 'Zip Code'), 'Email');
		
		$fields->insertBefore(HeaderField::create('Permanent', 'Permanent Address', 4), 'Email');
		$fields->insertBefore(TextField::create('PAddress', 'Address'), 'Email');
		$fields->insertBefore(TextField::create('PCity', 'City'), 'Email');
		$fields->insertBefore(DropdownField::create('PState', 'State', $this->StatesList())
			->setEmptyString('--select--'), 'Email');
		$fields->insertBefore(TextField::create('PPostalCode', 'Zip Code'), 'Email');
		
		$fields->insertBefore(HeaderField::create('Contact', '', 4), 'Email');
		$fields->insertBefore(TextField::create('ReferredBy', 'Referred by'), 'Available');
		$fields->insertBefore(HeaderField::create('Space1', '&nbsp;', 3), 'Available');
		
		$fields->insertBefore(HeaderField::create('EmploymentDesired', 'Employment Desired', 3), 'Available');
		$fields->push(CurrencyField::create('Salary'));
		
		// create enum drop down values for yes/no questions
		$YNarray = array('yes' => 'yes', 'no' => 'no');
		$fields->push(DropdownField::create('Employed', 'Are you employed?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(DropdownField::create('InquireEmployer', 'If so, may we inquire with your current employer?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(DropdownField::create('AppliedBefore', 'Ever applied to this company before?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(TextField::create('AppliedWhere', 'Where?'));
		$fields->push(TextField::create('AppliedWhen', 'When?'));
		
		$fields->push(HeaderField::create('Space2', '&nbsp;', 3), 'Available');
		$fields->push(HeaderField::create('EducationHistory', 'Education History', 3));
		
		$fields->push(HeaderField::create('Grammar', 'Grammar School', 4));
		$fields->push(TextField::create('GName', 'Name'));
		$fields->push(TextField::create('GYears', 'Years Attended'));
		$fields->push(DropdownField::create('GGrad', 'Did you graduate?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(TextField::create('GSubjects', 'Subjects studied'));
		
		$fields->push(HeaderField::create('HighSchool', 'High School', 4));
		$fields->push(TextField::create('HName', 'Name'));
		$fields->push(TextField::create('HYears', 'Years Attended'));
		$fields->push(DropdownField::create('HGrad', 'Did you graduate?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(TextField::create('HSubjects', 'Subjects studied'));
		
		$fields->push(HeaderField::create('College', 'College', 4));
		$fields->push(TextField::create('CName', 'Name'));
		$fields->push(TextField::create('CYears', 'Years Attended'));
		$fields->push(DropdownField::create('CGrad', 'Did you graduate?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(TextField::create('CSubjects', 'Subjects studied'));
		
		$fields->push(HeaderField::create('Trade', 'Trade, Business or Correspondence School', 4));
		$fields->push(TextField::create('TName', 'Name'));
		$fields->push(TextField::create('TYears', 'Years Attended'));
		$fields->push(DropdownField::create('TGrad', 'Did you graduate?', $YNarray)
			->setEmptyString('--select--'));
		$fields->push(TextField::create('TSubjects', 'Subjects studied'));
		
		$fields->push(HeaderField::create('Space3', '&nbsp;', 3));
		$fields->push(HeaderField::create('GeneralInformation', 'General Information', 3));
		
		$fields->push(TextareaField::create('SpecialStudy', 'Subjects of special study/research work or special training/skills'));
		$fields->push(HeaderField::create('Float1', '', 3));
		$fields->push(TextField::create('Military'));
		$fields->push(TextField::create('Rank'));
		
		$fields->push(HeaderField::create('Space4', '&nbsp;', 3));
		$fields->push(HeaderField::create('EmploymentHistory', 'Former Employers', 3));
		$fields->push(LiteralField::create('EHistory2', '<p>List below last four employers, starting with most recent first</p>'));
		
		$fields->push(HeaderField::create('E1', 'Employer', 4));
		$fields->push(TextField::create('E1From', 'From'));
		$fields->push(TextField::create('E1To', 'To'));
		$fields->push(TextField::create('E1Company', 'Name & Address'));
		$fields->push(CurrencyField::create('E1Salary', 'Salary'));
		$fields->push(TextField::create('E1Position', 'Position'));
		$fields->push(TextField::create('E1Leaving', 'Reason for leaving'));
		
		$fields->push(HeaderField::create('E2', 'Employer', 4));
		$fields->push(TextField::create('E2From', 'From'));
		$fields->push(TextField::create('E2To', 'To'));
		$fields->push(TextField::create('E2Company', 'Name & Address'));
		$fields->push(CurrencyField::create('E2Salary', 'Salary'));
		$fields->push(TextField::create('E2Position', 'Position'));
		$fields->push(TextField::create('E2Leaving', 'Reason for leaving'));
		
		$fields->push(HeaderField::create('E3', 'Employer', 4));
		$fields->push(TextField::create('E3From', 'From'));
		$fields->push(TextField::create('E3To', 'To'));
		$fields->push(TextField::create('E3Company', 'Name & Address'));
		$fields->push(CurrencyField::create('E3Salary', 'Salary'));
		$fields->push(TextField::create('E3Position', 'Position'));
		$fields->push(TextField::create('E3Leaving', 'Reason for leaving'));
		
		$fields->push(HeaderField::create('E4', 'Employer', 4));
		$fields->push(TextField::create('E4From', 'From'));
		$fields->push(TextField::create('E4To', 'To'));
		$fields->push(TextField::create('E4Company', 'Name & Address'));
		$fields->push(CurrencyField::create('E4Salary', 'Salary'));
		$fields->push(TextField::create('E4Position', 'Position'));
		$fields->push(TextField::create('E4Leaving', 'Reason for leaving'));
		
		$fields->push(HeaderField::create('Space5', '&nbsp;', 3));
		$fields->push(HeaderField::create('References', 'References', 3));
		$fields->push(LiteralField::create('RefDescip', '<p>Give the names of three persons not related to you, whom you have known at least one year.</p>'));
		
		$fields->push(HeaderField::create('R1', 'Reference', 4));
		$fields->push(TextField::create('R1Name', 'Name'));
		$fields->push(TextField::create('R1Address', 'Address'));
		$fields->push(TextField::create('R1Business', 'Business'));
		$fields->push(TextField::create('R1Years', 'Years Known'));
		
		$fields->push(HeaderField::create('R2', 'Reference', 4));
		$fields->push(TextField::create('R2Name', 'Name'));
		$fields->push(TextField::create('R2Address', 'Address'));
		$fields->push(TextField::create('R2Business', 'Business'));
		$fields->push(TextField::create('R2Years', 'Years Known'));
		
		$fields->push(HeaderField::create('R3', 'Reference', 4));
		$fields->push(TextField::create('R3Name', 'Name'));
		$fields->push(TextField::create('R3Address', 'Address'));
		$fields->push(TextField::create('R3Business', 'Business'));
		$fields->push(TextField::create('R3Years', 'Years Known'));
		
		$fields->push(LiteralField::create('Agree',
			'<p><b>By submitting this application</b>, "I certify that the facts contained in this application are true and complete to the best of my knowledge and understand that, if employed, falsified statements on this application shall be grounds for dismissal.</p>
			<p>I authorize investigation of all statements contained herein and the references and employers listed above to give you any and all information concerning my previous employment and any pertinent information they may have, personal or otherwise, and release the company from all liability from any damages that may result from utilization of such information.</p>
			<p>I also understand and agree that no representative of the company has any authority to enter into any agreement for employment for any specified period of time, or to make any agreement contrary to the foregoing, unless it is in writing and signed by an authorized company representative.</p>
			<p>This waiver does not permit the release or use of disability-related or medical information in a manner prohibited by the Americans with Disabilities Act (ADA) and other relevant federal and state laws."</p>'
		));
		
		return $fields;
				
	}
	
	// Required fields
	public function getRequiredFields() {
		
		$requiredFields = parent::getRequiredFields();

		$requiredFields->addRequiredField('Address');
		$requiredFields->addRequiredField('City');
		$requiredFields->addRequiredField('State');
		$requiredFields->addRequiredField('PostalCode');
		
		$requiredFields->addRequiredField('Available');
		$requiredFields->addRequiredField('Salary');
		$requiredFields->addRequiredField('Employed');
		$requiredFields->addRequiredField('AppliedBefore');
		
		$requiredFields->addRequiredField('R1Name');
		$requiredFields->addRequiredField('R1Address');
		$requiredFields->addRequiredField('R1Business');
		$requiredFields->addRequiredField('R1Years');
		
		return $requiredFields;
	}
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->removeByName('Resume');
		$fields->removeByName('Message');
		$fields->removeByName('JobID');
		
		// add custom fields
		$fields->insertBefore(HeaderField::create('Personal', 'Personal Information', 3), 'FirstName');
		$fields->insertBefore(HeaderField::create('Present', 'Present Address', 4), 'Email');
		$fields->insertBefore(TextField::create('Address'), 'Email');
		$fields->insertBefore(TextField::create('City'), 'Email');
		$fields->insertBefore(DropdownField::create('State', 'State', $this->StatesList())
			->setEmptyString('--select--'), 'Email');
		$fields->insertBefore(TextField::create('PostalCode', 'Zip Code'), 'Email');
		
		$fields->insertBefore(HeaderField::create('Permanent', 'Permanent Address', 4), 'Email');
		$fields->insertBefore(TextField::create('PAddress', 'Address'), 'Email');
		$fields->insertBefore(TextField::create('PCity', 'City'), 'Email');
		$fields->insertBefore(DropdownField::create('PState', 'State', $this->StatesList())
			->setEmptyString('--select--'), 'Email');
		$fields->insertBefore(TextField::create('PPostalCode', 'Zip Code'), 'Email');
		
		$fields->insertBefore(HeaderField::create('Contact', '', 4), 'Email');
		$fields->insertBefore(TextField::create('ReferredBy', 'Referred by'), 'Available');
		
		// Jobs dropdown
		$JobsField = new DropdownField('JobID', 'Job', Job::get()->map('ID', 'Title'));
		$JobsField->setEmptyString('--Select--');

		// Employment Tab
		$fields->push(new Tab('Employment'));
		
		// create enum drop down values for yes/no questions
		$YNarray = array('yes' => 'yes', 'no' => 'no');
		
		$fields->addFieldsToTab('Root.Position', array(
			HeaderField::create('EmploymentDesired', 'Employment Desired', 3),
			ReadOnlyField::create('Position', 'Position', Job::get()->byID($this->Job()->ID)->getTitle()),
			CurrencyField::create('Salary'),
			DropdownField::create('Employed', 'Are you employed?', $YNarray)
				->setEmptyString('--select--'),
			DropdownField::create('InquireEmployer', 'If so, may we inquire with your current employer?', $YNarray)
				->setEmptyString('--select--'),
			TextField::create('AppliedWhere', 'Where?'),
			TextField::create('AppliedWhen', 'When?')
		));
		
		// Education Tab
		$fields->push(new Tab('Education'));
		$fields->addFieldsToTab('Root.Education', array(
			HeaderField::create('EducationHistory', 'Education History', 3),
		
			HeaderField::create('Grammar', 'Grammar School', 4),
			TextField::create('GName', 'Name'),
			TextField::create('GYears', 'Years Attended'),
			DropdownField::create('GGrad', 'Did you graduate?', $YNarray)
				->setEmptyString('--select--'),
			TextField::create('GSubjects', 'Subjects studied'),
			
			HeaderField::create('HighSchool', 'High School', 4),
			TextField::create('HName', 'Name'),
			TextField::create('HYears', 'Years Attended'),
			DropdownField::create('HGrad', 'Did you graduate?', $YNarray)
				->setEmptyString('--select--'),
			TextField::create('HSubjects', 'Subjects studied'),
			
			HeaderField::create('College', 'College', 4),
			TextField::create('CName', 'Name'),
			TextField::create('CYears', 'Years Attended'),
			DropdownField::create('CGrad', 'Did you graduate?', $YNarray)
				->setEmptyString('--select--'),
			TextField::create('CSubjects', 'Subjects studied'),
			
			HeaderField::create('Trade', 'Trade, Business or Correspondence School', 4),
			TextField::create('TName', 'Name'),
			TextField::create('TYears', 'Years Attended'),
			DropdownField::create('TGrad', 'Did you graduate?', $YNarray)
				->setEmptyString('--select--'),
			TextField::create('TSubjects', 'Subjects studied')
		));
		
		// Education Tab
		$fields->push(new Tab('General'));
		$fields->addFieldsToTab('Root.General', array(
			TextareaField::create('SpecialStudy', 'Subjects of special study/research work or special training/skills'),
			TextField::create('Military'),
			TextField::create('Rank')
		));
		
		// Employers Tab
		$fields->push(new Tab('Employers'));
		$fields->addFieldsToTab('Root.Employers', array(
			HeaderField::create('EmploymentHistory', 'Former Employers', 3),
			LiteralField::create('EHistory2', '<p>List below last four employers, starting with most recent first</p>'),
			
			HeaderField::create('E1', 'Employer', 4),
			TextField::create('E1From', 'From'),
			TextField::create('E1To', 'To'),
			TextField::create('E1Company', 'Name & Address'),
			CurrencyField::create('E1Salary', 'Salary'),
			TextField::create('E1Position', 'Position'),
			TextField::create('E1Leaving', 'Reason for leaving'),
			
			HeaderField::create('E2', 'Employer', 4),
			TextField::create('E2From', 'From'),
			TextField::create('E2To', 'To'),
			TextField::create('E2Company', 'Name & Address'),
			CurrencyField::create('E2Salary', 'Salary'),
			TextField::create('E2Position', 'Position'),
			TextField::create('E2Leaving', 'Reason for leaving'),
			
			HeaderField::create('E3', 'Employer', 4),
			TextField::create('E3From', 'From'),
			TextField::create('E3To', 'To'),
			TextField::create('E3Company', 'Name & Address'),
			CurrencyField::create('E3Salary', 'Salary'),
			TextField::create('E3Position', 'Position'),
			TextField::create('E3Leaving', 'Reason for leaving'),
			
			HeaderField::create('E4', 'Employer', 4),
			TextField::create('E4From', 'From'),
			TextField::create('E4To', 'To'),
			TextField::create('E4Company', 'Name & Address'),
			CurrencyField::create('E4Salary', 'Salary'),
			TextField::create('E4Position', 'Position'),
			TextField::create('E4Leaving', 'Reason for leaving')
		));
		
		$fields->push(new Tab('References'));
		$fields->addFieldsToTab('Root.References', array(
			HeaderField::create('References', 'References', 3),
			LiteralField::create('RefDescip', '<p>Give the names of three persons not related to you, whom you have known at least one year.</p>'),
			
			HeaderField::create('R1', 'Reference', 4),
			TextField::create('R1Name', 'Name'),
			TextField::create('R1Address', 'Address'),
			TextField::create('R1Business', 'Business'),
			TextField::create('R1Years', 'Years Known'),
			
			HeaderField::create('R2', 'Reference', 4),
			TextField::create('R2Name', 'Name'),
			TextField::create('R2Address', 'Address'),
			TextField::create('R2Business', 'Business'),
			TextField::create('R2Years', 'Years Known'),
			
			HeaderField::create('R3', 'Reference', 4),
			TextField::create('R3Name', 'Name'),
			TextField::create('R3Address', 'Address'),
			TextField::create('R3Business', 'Business'),
			TextField::create('R3Years', 'Years Known')
		));
		
		return $fields;
	}
	
}