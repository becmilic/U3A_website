<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'add');
    }

	public function login() {
		//if already logged-in and accessing login page...
		if ($this->Session->check('Auth.User')){
			// if you go back a screen or enter the login url, you get logged out 
			$this->redirect($this->Auth->logout()); // stops entering a fake password along the saved email to log in
			
			// old redirect if logged in
			// $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		}
		
		$this->layout='login_layout';
		$this->Session->setFlash(__('Please Login to Continue'));
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }
	
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
    }

    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            $this->Session->setFlash('Invalid User ID Provided');
            $this->redirect($this->referer());
        }
        $user = $this->User->findById($id);

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;
            if($this->request->data['User']['password'] == ''){
                unset($this->request->data['User']['password']);
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'));
                $this->redirect(array('action' => 'edit', $id));
            }else{
                $this->Session->setFlash(__('Unable to update your user.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
    }

    /* public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
		
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }


    public function reset_password($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }

        //Reset the password
        //Generate new password (hard code password first)
        $newPassword = 'temp123';
        //Save new password to member
        $this->User->id = $id;
        $this->User->saveField('password',$newPassword);

        //Send email for reset password
        $Email = new CakeEmail();
        $Email->template('forgotten_password', 'default')
            ->emailFormat('html')
            ->to($this->User->field('email'))
            ->from('no-reply@u3a.org.au')
            ->viewVars(array('newPassword' => $newPassword))
            ->send();

        //set template, find the email address of the memeber
        //Send email off
        $this->Session->setFlash('Your password has been reset and sent you to your email address');
        $this->redirect($this->referer());
    }


}