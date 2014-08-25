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

        $user = $this->Auth->user();
        $this->set('user',$user);

        $this->loadModel('Member');
        $member = $this->Member->find('first',array(
            'conditions'=>array('Member.id'=>$this->Auth->User('member_id')),
            'contain'=>array()
        ));
        $this->set('currentMember',$member);

		// restrict to super user...
		/*
			Now... in the .ctp file...
		
			if($is_superuser)
			{
				code
			}
			
			don't forget to add the <?php stuff
		*/
        
        $this->set('is_superuser', $user['role'] == 'superuser');

        // restrict to office volunteer...
        $this->set('is_officevolunteer', $user['role'] == 'officevolunteer');

        // restrict to teaching staff..
        $this->set('is_teachingstaff', $user['role'] == 'teachingstaff');
   	}
	
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
}
