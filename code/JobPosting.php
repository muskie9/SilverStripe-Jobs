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
			'Success'
		);
	
		public function init() {
			parent::init();
	
			Validator::set_javascript_validation_handler('none'); //to fix conflict with jquery, need to add jquery validation
			Requirements::block('sapphire/thirdparty/prototype/prototype.js');
		}
		
		protected function ApplicationForm(){
		
			define('SPAN', '<span class="required">*</span>');
			$FirstName = new TextField('FirstName', 'First Name*');
			$LastName = new TextField('LastName', 'Last Name*');
			$Email = new EmailField('Email', 'Email*');
			$Phone = new TextField('Phone', 'Phone Number');
			$Bio = new TextareaField('Bio', 'About You');
			$File = new FileUploadField('Resume', 'Resume');
			$Skills = new TextField('Skills', 'Your Skills');
			$Site1 = new TextField('Site1', 'Website 1');
			$Site2 = new TextField('Site2', 'Website 2');
			$Site3 = new TextField('Site3', 'Website 3');
			
			$fields = new FieldSet(
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
			$Application->write();
			//Director::redirect($this->Link('Success'));
		
		}
		
		public function Success(){
			return array();
		}
		
		public function IsSuccess(){
		
			$url = Director::URLParams();
			return (isset($url['ID']) && ($url['ID'] == 'Success'));
			
		}
	
	}