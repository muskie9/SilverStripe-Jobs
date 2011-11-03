<?php

	class Application extends DataObject{
	
		static $db = array(
			'FirstName' => 'Varchar',
			'LastName' => 'Varchar',
			'Email' => 'Varchar(255)',
			'Phone' => 'Varchar',
			'Bio' => 'Text',
			'Skills' => 'Varchar(255)',
			'Site1' => 'Varchar(255)',
			'Site2' => 'Varchar(255)',
			'Site3' => 'Varchar(255)'
		);
		
		static $has_one = array(
			'JobPosting' => 'JobPosting',
			'Resume' => 'File'
		);
		
		static $has_many = array(
			
		);
		
		static $many_many = array(
			
		);
		
		function getCMSFields(){
			
			$fields = new FieldSet(
			
				new TextField('FirstName'),
				new TextField('LastName'),
				new EmailField('Email')
			
			);
			
			return $fields;
			
		}
		
		function onAfterWrite(){
			parent::onAfterWrite();
			
			//$current = DataObject::get_by_id('Application',$this->ID);
			
			$parent = $this->JobPostingID;
			$parent = DataObject::get_by_id('JobPosting',$parent);
			
			$email = $parent->Mailto;
			
			$from = $this->Email;
			$to = $email;
			$subject = $parent->Title. " Application";
			$email = new Email($from, $to, $subject);
			$email->setTemplate('ApplicationEmail');
			$email->populateTemplate($this);
			$email->send();
			Director::redirect($parent->Link('Success'));
		}
	
	}