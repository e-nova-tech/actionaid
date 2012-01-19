<?php
/**
 * Posts Controller
 * 
 * @package     app.Controller.PostsController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class PostsController extends AppController {
  public $name = 'Posts';

  public function admin_index() {
    $data = $this->paginate();
    $this->set('posts', $data);
  }

  public function admin_view($id) {
    $this->Post->id = $id;
    $this->set('post', $this->Post->read());
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash('Your post has been saved.');
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash('Unable to add your post.');
      }
    }
  }

  public function admin_edit($id = null) {
    $this->Post->id = $id;
    if ($this->request->is('get')) {
      $this->request->data = $this->Post->read();
    } else {
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash(__('Your post has been updated.'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('Unable to update your post.'));
      }
    }
  }

  public function admin_delete($id) {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }
    if ($this->Post->delete($id)) {
      $this->Session->setFlash(sprintf(__('The post with id: %s has been deleted.'), $id));
      $this->redirect(array('action' => 'index'));
    }
  }

}

