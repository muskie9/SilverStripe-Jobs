<?php

	class JobPosting extends Page{
	
		static $db = array(
			'Mailto' => 'Varchar(255)',
			'SubmitText' => 'HTMLText'
		);
		
		static $has_one = array(
			
		);
		
		static $has_many = array(
			'Resumes' => 'Resume'
		);
		
		static $many_many = array(
			
		);
		
		static $can_be_root = false;
		
		/**
		 * @var Array Default values of variables when this page is created
		 */ 
		static $defaults = array(
			'SubmitText' => '<p>Thank you for applying online. We will review your application and someone from our team will get back to you soon!</p>'
		);
		
		function getCMSFields() {
			$fields = parent::getCMSFields();
			
			$fields->addFieldToTab('Root.Content.MailTo', new EmailField('Mailto', 'Recipient'));
			$fields->addFieldToTab('Root.Content.MailTo', new HTMLEditorField('SubmitText', 'Text after successful submission'));
			
			$fields->addFieldToTab('Root.Content.Applications', new ComplexTableField($this, 'Applications', 'Application'));
			
			return $fields;
		}
	
	}
	
	class JobPosting_Controller extends Page_Controller{
	
		/**
		 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
		 * permissions or conditions required to allow the user to access it.
		 *
		 * <code>
		 * array (
		 *     'action', // anyone can access this action
		 *     'action' => true, // same as above
		 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
		 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
		 * );
		 * </code>
		 *
		 * @var array
		 */
		public static $allowed_actions = array (
			'ApplicationForm',
			'Success',
			'applicants',
			'application',
			'deleteApplication',
			'printApplicant'
		);
	
		public function init() {
			parent::init();
	
			Validator::set_javascript_validation_handler('none'); //to fix conflict with jquery
			Requirements::block('sapphire/thirdparty/prototype/prototype.js');
		}
		
		protected function ApplicationForm(){
		
			define('SPAN', '<span class="required">*</span>');
			$FormTitle = new LiteralField('title','<h3>Apply Online</h3>');
			$FirstName = new TextField('FirstName', 'First Name*');
			$LastName = new TextField('LastName', 'Last Name*');
			$Email = new EmailField('Email', 'Email*');
			$Phone = new TextField('Phone', 'Phone Number');
			$Bio = new TextareaField('Bio', 'About You');
			$File = new FileUploadField('Resume', 'Resume');
			$File->setFileTypes(array(
	            'doc',
	            'docx',
	            'pdf'
	        ));

			$Skills = new TextareaField('Skills', 'Your Skills');
			$Site1 = new TextField('Site1', 'Website 1');
			$Site2 = new TextField('Site2', 'Website 2');
			$Site3 = new TextField('Site3', 'Website 3');
			
			$fields = new FieldSet(
				$FormTitle,
				$FirstName,
				$LastName,
				$Email,
				$Phone,
				$Bio,
				$File,
				$Skills,
				$Site1,
				$Site2,
				$Site3
			);
			
			$Send = new FormAction('SubmitApplication', 'Submit Application');
			
			$Actions = new FieldSet(
				$Send
			);
			
			$validator = new RequiredFields(
				'FirstName',
				'LastName',
				'Email'
			);
			
			return new Form($this, 'ApplicationForm', $fields, $Actions, $validator);
		
		}
		
		public function SubmitApplication($data, $form){
		
			$Application = new Application();
			$form->saveInto($Application);
			$Application->JobPostingID = $this->ID;
			
			$sites = array(
				$data['Site1'],
				$data['Site2'],
				$data['Site3']
			);
			
			$count = 1;
			
			foreach($sites as $site){
				$url = $this->parseSite($site);

				if($count==1){
					$Application->Site1 = $url;
				}elseif($count==2){
					$Application->Site2 = $url;
				}else{
					$Application->Site3 = $url;
				}
				$count++;
			}
			
			
			$Application->write();
		
		}
		
		public function Success(){
			return array();
		}
		
		public function IsSuccess(){
		
			$url = Director::URLParams();
			return (isset($url['ID']) && ($url['ID'] == 'Success'));
			
		}
		
		public function parseSite($url=null){
						
			$search = "https://";
			$search2 = "http://";
			$replace = "";
			
			if(strpos($url, $search)!==false){
				$search = "https://";
				$site = str_replace($search, $replace, $url);
			}elseif(strpos($url, $search2)!==false){
				$search = "http://";
				$site = str_replace($search, $replace, $url);
			}else{
				$site = $url;
			}
			
			return $site;
			
		}
		
		protected function SecCheck(){
			return (Permission::check('ADMIN')) ? true : false;
		}
		
		protected function applicants(){
		
			if(Permission::check('ADMIN')){
			
				$Applicants = DataObject::get('Application', 'JobPostingID = '.$this->ID);
				$page = $this->customise(array(
					'Title' => $this->Title." Applicants",
					'Applicants' => $Applicants
				));
				
			}else{
			
				$page = $this->customise(array(
					'Title' => "Insufficient Permissions",
					'Content' => "You don't have proper permissions to view this content. <a href=\"/Security/Login\">Login to gain access</a>"
				));
			
			}
			
			return $page;
		
		}
		
		protected function application(){
		
			if(Permission::check('ADMIN')){
			
				$Params = $this->getURLParams();
				$applicantID = $Params['ID'];
				$Applicant = DataObject::get_by_id('Application', $applicantID);
				$page = $this->customise(array(
					'Applicant' => $Applicant
				));
				
			}else{
			
				$page = $this->customise(array(
					'Title' => "Insufficient Permissions",
					'Content' => "You don't have proper permissions to view this content. <a href=\"/Security/Login\">Login to gain access</a>"
				));
			
			}
			
			return $page;
		
		}
		
		public function deleteApplication(){
		
			if(Permission::check('ADMIN')){
			
				$Params = $this->getURLParams();
				$applicantID = $Params['ID'];
				$Applicant = DataObject::get_by_id('Application', $applicantID);
				$dupe = $Applicant;
				$Applicant->delete();
				$page = $this->customise(array(
					'Applicant' => $dupe
				));
				
			}else{
			
				$page = $this->customise(array(
					'Title' => "Insufficient Permissions",
					'Content' => "You don't have proper permissions to view this content. <a href=\"/Security/Login\">Login to gain access</a>"
				));
			
			}
			
			return $page;
		
		}
		
		public function printApplicant(){
		
			if(Permission::check('ADMIN')){
			
				$Params = $this->getURLParams();
				$applicantID = $Params['ID'];
				$Applicant = DataObject::get_by_id('Application', $applicantID);
				$page = $this->customise(array(
					'Applicant' => $Applicant
				));
				
			}else{
			
				$page = $this->customise(array(
					'Title' => "Insufficient Permissions",
					'Content' => "You don't have proper permissions to view this content. <a href=\"/Security/LoginForm\">Login to gain access</a>"
				));
			
			}
			
			return $page;
		
		}
		
		protected function anyApps(){
		
			
			return (($applicants = DataObject::get('Application','JobPostingID ='.$this->ID))) && $this->secCheck() ? true : false;
		
		}
		
		public function getCheck(){
			
			return (isset($_GET['form-toggle']) && ($_GET['form-toggle'] == 'show')) ? true : false;
			
		}
	
	}