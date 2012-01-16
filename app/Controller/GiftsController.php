<?php
// app/Controller/GiftsController.php
class GiftsController extends AppController {

  function beforeFilter() {
    $this->Auth->allow('add');
  }

  public function add($appeal=null) {
    $this->Gift->set($this->request->data);
    $this->Gift->Person->set($this->request->data);
    if ($this->Gift->Person->validates()) {
    } else {
    }
  }
}
