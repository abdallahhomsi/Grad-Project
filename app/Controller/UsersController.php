<?php
// remove group, add picture to the post ,specify the manager and the user roles, add link to go back to home screen
class UsersController extends AppController
{
    public $helpers = array('Form', 'Html');


    public function login()
    {
        if ($this->request->is('post')) {
            $check = $this->User->find('all', [
                'recursive' => -1,
                'fields' => ['email', 'password', 'id'],
                'conditions' => ['email' => $this->request->data['User']['email']]
            ]);
            if (
                $this->request->data['User']['email'] === $check[0]['User']['email']
                && $this->request->data['User']['password'] === $check[0]['User']['password']
            ) {
                $this->Flash->success(__('Welcome to Safe Community'));
                $this->Session->write('User.id', $check[0]['User']['id']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Sorry something went wrong'));
        }
    }
    public function add()
    {
        $this->loadModel('Group');
        $this->loadModel('Role');
        $this->loadModel('UserRole');
        if ($this->request->is('post')) {
            // $this->User->create();
            //pr($this->request->data);die;
            if ($this->request->data['User']['password'] !== $this->request->data['User']['repassword']) {
                $this->Flash->error(__('the password and repassword not the same'));
                return $this->redirect(['action' => 'add']);
            }
            $temp = [
                'username' => $this->request->data['User']['username'],
                'password' => $this->request->data['User']['password'],
                'email' => $this->request->data['User']['email'],
                'role_id' => $this->request->data['User']['role_id']
            ];
            //pr($this->request->data);die;
            if ($this->User->save($temp)) {
                $id = $this->User->find('first', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['email' => $this->request->data['User']['email']]]);
                foreach ($this->request->data['User']['group_options'] as $lo) :
                    $temp2 = ['user_id' => $id['User']['id'], 'group_id' => $lo, 'role_id' => 1];
                    $this->UserRole->create();
                    $this->UserRole->save($temp2);
                endforeach;
                $this->Flash->success(__('The user has been saved'));
                $this->Session->write('User.id', $id['User']['id']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('sorry something went wrong'));
        } else {
            $group_options = $this->Group->find('list', [
                'recursive' => -1,
                'fields' => ['Group.id', 'Group.name'],
                'limit' => 5
            ]);

            $this->set('group_options', $group_options);
        }
    }
    public function index()
    {
        $this->loadModel('Post');
        $this->loadModel('UserRole');
		$id = 60;
        $groups_id = $this->UserRole->find(
            'all',
            [
                'recursive' => -1,
                'fields' => ['group_id'],
                'conditions' => ['user_id' => $id]
            ]
        );
        $temp = [];
        foreach ($groups_id as $gi) :
            array_push($temp, $gi['UserRole']['group_id']);
        endforeach;
        $posts = $this->Post->find(
            'all',
            [
                'recursive' => -1,
                'fields' => ['title', 'Post.body', 'Post.id', 'Post.likes'],
                'conditions' => ['group_id' => $temp]
            ]
        );
        $this->set('posts', json_encode($posts));
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
