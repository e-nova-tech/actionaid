<?php
/**
 * Appeals Controller
 *
 * @package     app.Controller.AppealsController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppealsController extends AppController {
  public $name = 'Appeals';

  public function admin_index() {
    $this->set('appeals',$this->paginate());
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Appeal->create();
      if ($this->Appeal->save($this->request->data)) {
        echo "save";
        $this->Message->success(__('Your appeal has been saved.'));
        $this->redirect(array('action' => 'admin_index'));
      } else {
        echo "!save";
        $this->Message->error(__('Unable to add your appeal.'));
      }
    }
    $this->set('appeal_status_options',$this->Appeal->getStatusOptions());
  }

  public function admin_edit($id = null) {
    $this->Appeal->id = $id;
    $this->set('appeal_status_options',$this->Appeal->getStatusOptions());
    if ($this->request->is('get')) {
      $this->request->data = $this->Appeal->read();
    } else {
      if ($this->Appeal->save($this->request->data)) {
        $this->Message->notice(__('Your appeal has been updated.'));
        $this->redirect(array('action' => 'index'));
      } else {
        pr($this->request->data);
        pr($this->Appeal->validationErrors);
        $this->Message->error(__('Unable to update your appeal.'));
      }
    }
  }

  /**
   * Admin Delete
   * @access public
   */
  public function admin_delete($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->Appeal->id = $id;
    if (!$this->Appeal->exists()) {
      throw new NotFoundException(__('Invalid appeal'));
    }
    if ($this->Appeal->delete()) {
      $this->Message->success(__('The appeal was deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Message->error(__('The appeal was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
}
