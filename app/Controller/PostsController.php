<?php

class PostsController extends AppController
{
	public $helpers = array('Html', 'Form');
	public function index()
	{
		$this->loadModel('Post');
		$this->loadModel('UserRole');
		$this->loadModel('User');
		$this->loadModel('Group');

		$id = $this->Session->read('User.id');
		$groups_id = $this->UserRole->find(
			'all',
			[
				'recursive' => -1,
				'fields' => ['group_id'],
				'conditions' => ['user_id' => $id]
			]
		);
		$temp = [];
		foreach ($groups_id as $gi):
			array_push($temp, $gi['UserRole']['group_id']);
		endforeach;
		$group_name = $this->Group->find('list', [
			'recursive' => -1,
			'fields' => ['name'],
			'conditions' => ['id' => $temp]
		]);
		$posts = $this->Post->find(
			'all',
			[
				'recursive' => -1,
				'fields' => ['Post.title', 'Post.body', 'Post.id', 'Post.likes', 'Post.pic_path', 'User.username', 'User.id', 'User.role_id', 'Group.name'],
				'conditions' => ['Post.group_id' => $temp],
				'joins' => [
					[
						'table' => 'users',
						'alias' => 'User',
						'type' => 'inner',
						'conditions' => ['Post.user_id = User.id']
					],
					[
						'table' => 'groups',
						'alias' => 'Group',
						'type' => 'inner',
						'conditions' => ['Post.group_id = Group.id']
					]
				]
			]
		);
		$currentRole = $this->User->find('all', [
			'recursive' => -1,
			'fields' => ['role_id'],
			'conditions' => ['id' => $this->Session->read('User.id')]
		]);

		$this->set('posts', json_encode($posts));
		$this->set('posts', json_encode($currentRole));
		$this->set('groups', json_encode($group_name));
	}
	public function view($id = null)
	{
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->loadModel('PostCounter');
		$this->loadModel('Comment');
		if (empty($this->request->data)) {
			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->loadModel('Comment');
			$this->loadModel('User');
			$temp = $this->Comment->find('all', [
				'recursive' => -1,
				'fields' => ['Comment.id', 'Comment.body', 'Comment.created', 'Comment.user_id', 'User.username'],
				'conditions' => ['post_id' => $id],
				'joins' => [
					[
						'table' => 'users',
						'alias' => 'User',
						'type' => 'inner',
						'conditions' => ['Comment.user_id = User.id']
					]
				]
			]);
			$t = $this->PostCounter->find('all', [
				'recursive' => -1,
				'fields' => ['post_id', 'user_id'],
				'conditions' => ['post_id' => $id, 'user_id' => $this->Session->read('User.id')]
			]);
			if (!empty($t)) {
				$post['Post']['t'] = 1;
			} else {
				$post['Post']['t'] = 0;
			}
			$this->set('comments', $temp);
			$this->set('post', $post);
		} else {
			$check = $this->PostCounter->find('all', [
				'recursive' => -1,
				'fields' => ['id', 'post_id', 'user_id'],
				'conditions' => ['post_id' => $id, 'user_id' => $this->Session->read('User.id')]
			]);
			if (empty($check) && !empty($this->request->data['comment']['like'])) {
				$this->PostCounter->create();
				$this->PostCounter->save(['post_id' => $id, 'user_id' => $this->Session->read('User.id')]);
			} else if (!empty($check) && empty($this->request->data['comment']['like'])) {
				$this->PostCounter->deleteAll(['post_id' => $id, 'user_id' => $this->Session->read('User.id')]);
			}
			$temp = $this->PostCounter->find('first', [
				'recursive' => -1,
				'fields' => ['count(PostCounter.post_id)'],
				'conditions' => ['PostCounter.post_id' => $id],
				'group' => 'post_id'
			]);
			if (!empty($temp)) {
				$this->Post->updateAll(
					['likes' => $temp[0]['count(`PostCounter`.`post_id`)']],
					['id' => $id]
				);
			} else {
				$this->Post->updateAll(
					['likes' => 0],
					['id' => $id]
				);
			}
			$this->Comment->create();
			if (empty($this->request->data['comment']['body'])) {
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$temp = [
				'body' => $this->request->data['comment']['body'],
				'user_id' => $this->request->data['comment']['user_id'],
				'post_id' => $this->request->data['comment']['post_id']
			];
			if ($this->Comment->save($temp)) {
				$this->Flash->success(__('Your Comment has been saved.'));
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
		}
	}

	public function add()
	{
		$this->loadModel('Group');
		$this->loadModel('UserRole');
		if ($this->request->is('post')) {
			$this->autoRender = false;
			$data = $this->request->data;
			if (!empty($_FILES)) {
				$file = $_FILES['file'];
				$allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
				$allowedSize = 1024 * 1024; // 1 MB
				if (!in_array(pathinfo($file['name'], PATHINFO_EXTENSION), $allowedTypes)) {
					$this->Flash->error(__('Invalid file type.'));
				} elseif ($file['size'] > $allowedSize || $file['size'] == 0) {
					$this->Flash->error(__('File size exceeds limit.'));
				} else {
					$temp = [
						'title' => $data['title'],
						'body' => $data['content'],
						'pic_path' => $file['name'],
						'likes' => 0,
						'user_id' => $this->Session->read('User.id'),
						'group_id' => $data['group_id']
					];
				}
				move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $file['name']);
			} else {
				$temp = [
					'title' => $data['title'],
					'body' => $data['content'],
					'likes' => 0,
					'user_id' => $this->Session->read('User.id'),
					'group_id' => $data['group_id']
				];
			}
			$this->Post->create();
			$this->Post->save($temp);
			echo json_encode($temp);

		} else {
			$this->loadModel('Group');
			$group_options = $this->Group->find('all', [
				'recursive' => -1,
				'fields' => ['id', 'name']
			]);
			$id = $this->Session->read('User.id');
			$groups_id = $this->UserRole->find(
				'list',
				[
					'recursive' => -1,
					'fields' => ['group_id'],
					'conditions' => ['user_id' => $id]
				]
			);
			$final = [];
			foreach ($group_options as $key => $value) {
				if (!empty(array_search($key, $groups_id))) {
					$final[$key] = $value;
				}
			}
			$this->set('group_info', $final);
		}
	}



	public function edit($id = null)
	{
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('Your post has been updated.'));
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this->Flash->error(__('Unable to update your post.'));
		}
		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}
	public function delete($id = null)
	{
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->loadModel('PostCounter');
		$this->loadModel('Comment');
		if ($this->Post->delete($id, true)) {
			$this->Flash->success(__('Your post has been deleted.'));
			return $this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
	}
}