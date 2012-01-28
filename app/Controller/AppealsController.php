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
    $this->set('appeal_status_options',$this->Appeal->getStatusOptions());
    if ($this->request->is('post')) {
      if ($this->Appeal->save($this->request->data)) {
        $this->Message->notice(__('Your appeal has been saved.'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Message->error(__('Unable to add your appeal.'));
      }
    }
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
        $this->Message->error(__('Unable to update your appeal.'));
      }
    }
  }

}
