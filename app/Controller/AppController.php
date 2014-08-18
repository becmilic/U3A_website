<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

public $components = array('Session',
	'Auth' => array(
        'loginAction' => array('controller' => 'users','action' => 'login'),
	    'authError' => 'You must be logged in to view this page',
	    'loginError' => 'Invalid Username or Password entered, please try',
	    'authenticate' => array('Form' => array('fields' => array('username' => 'email')))
    )
);

	public function beforeFilter() {
        $this->Auth->allow('login');
		
		$role = $this->Auth->User('role'); // define user role

		// restrict to super user...
		/*
			Now... in the .ctp file...
		
			if($is_superuser)
			{
				code
			}
			
			don't forget to add the <?php stuff
		*/
        
        $this->set('is_superuser', $role == 'superuser');

        // restrict to office volunteer...
        $this->set('is_officevolunteer', $role == 'officevolunteer');

        // restrict to teaching staff..
        $this->set('is_teachingstaff', $role == 'teachingstaff');
   	}
	
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
}
