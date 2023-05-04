<?php

class PostsController extends AppController
{
   public $helpers = array('Html', 'Form');
   public function index()
   {
     
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
            'fields' => ['Comment.id','Comment.body', 'Comment.created', 'Comment.user_id', 'User.username'],
            'conditions' => ['post_id' => $id],
            'joins' => [[
               'table' => 'users',
               'alias' => 'User',
               'type' => 'inner',
               'conditions' => ['Comment.user_id = User.id']
            ]]
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
         }else{
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
         $this->Post->create();
         $this->request->data['Post']['user_id'] = $this->Session->read('User.id');
         if ($this->Post->save($this->request->data)) {
            $this->Flash->success(__('Your post has been saved.'));
            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
         }
         $this->Flash->error(__('Unable to add your post.'));
      } else {
         $this->loadModel('Group');
         $group_options = $this->Group->get_data();
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
  public function delete($id = null ){
   if (!$id) {
      throw new NotFoundException(__('Invalid post'));
  }
  $this->loadModel('PostCounter');
  $this->loadModel('Comment');
  if ($this->Post->delete($id,true)) {
      $this->Flash->success(__('Your post has been deleted.'));
      return $this->redirect(array('controller' => 'users', 'action' => 'index'));
  }
  }
}
