<?php
// remove group, add picture to the post ,specify the manager and the user roles, add link to go back to home screen
class UsersController extends AppController
{
	public $helpers = array('Form', 'Html');


	public function login()
	{
		if ($this->request->is('post')) {
			$this->autoRender = false;
			$data = json_decode(file_get_contents('php://input'), true);
			$check = $this->User->find('all', [
				'recursive' => -1,
				'fields' => ['username', 'password', 'id'],
				'conditions' => ['username' => $data['username']]
			]);
			if (
				$data['username'] === $check[0]['User']['username']
				&& $data['password'] === $check[0]['User']['password']
			) {
				$this->Session->write('User.id', $check[0]['User']['id']);
				$check = 1;
			}
			echo json_encode($check);
		}
	}
	public function register()
	{
		$this->loadModel('Group');
		$this->loadModel('Role');
		$this->loadModel('UserRole');
		if ($this->request->is('post')) {
			$this->autoRender = false;
			$data = json_decode(file_get_contents('php://input'), true);

			$temp = [
				'username' => $data['username'],
				'email' => $data['email'],
				'password' => $data['password'],
				'role_id' => $data['role_id'],
				'group_id' => 11,
				'first_name' => $data['first_name'],
				'family_name' => $data['family_name'],
			];
			$check = $this->User->find('first', [
				'recursive' => -1,
				'fields' => ['username'],
				'conditions' => ['username' => $temp['username']]
			]);
			if (empty($check)) {
				$check = 1;
				if ($this->User->save($temp)) {
					$id = $this->User->find('first', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['email' => $data['email']]]);
					foreach ($data['groups'] as $lo):
						$temp2 = ['user_id' => $id['User']['id'], 'group_id' => $lo, 'role_id' => $data['role_id']];
						$this->UserRole->create();
						$this->UserRole->save($temp2);
					endforeach;
				}
			}
			echo json_encode($check);
		} else {
			$group_options = $this->Group->find('list', [
				'recursive' => -1,
				'fields' => ['Group.id', 'Group.name']
			]);
			$this->set('group_options', json_encode($group_options));
		}
	}

	public function editUser($id = null)
	{
		if (empty($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if (empty($this->request->data)) {
			$user_info = $this->User->findById($id);
			$this->request->data = $user_info;
			unset($this->request->data['User']['password']);
		} else {
			if (!empty($this->request->data['User']['new_password']))
				$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been save'));
				return $this->redirect(['action' => 'index']);
			}
			unset($this->request->data['User']['new_password']);
		}
	}
}