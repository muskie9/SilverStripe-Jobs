<?php

	class JobHolder extends Page{
	
		static $db = array(
			
		);
		
		static $has_one = array(
			
		);
		
		static $has_many = array(
			
		);
		
		static $many_many = array(
			
		);
		
		static $can_be_root = true;
		
		static $allowed_children = array(
			'JobPosting'
		);
	
	}
	
	class JobHolder_Controller extends Page_Controller{
	
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
		);
	
		public function init() {
			parent::init();
	
			
		}
	
	}