<?php
/**
 * Appeal Model
 * 
 * @package     app.Model.Appeal
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Appeal extends AppModel {
  public $name = 'Appeal';

  // relationships
  public $hasMany = array(
    'Gift' => array(
      'className'    => 'Gift',
      'dependent'    => false
    )
  );

  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = Appeal::getValidationRules();
  }

  static function getValidationRules($context=null) {
    return array(
      'title' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an appeal name')
        ),
        'maxlength' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your appeal name should not be longer than 64 characters')
        )
      ),
      'description' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an appeal description')
        ),
        'maxlength' => array(
          'rule' => array('maxLength', '128'),
          'message' => __('Your appeal description should not be longer than 128 characters')
        )
      ),
      'slug' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an appeal slug')
        ),
        'unique' => array(
          'rule' => array('isUnique'),
          'message' => __('Sorry this appeal slug is already in use')
        ),
        'pattern' => array(
          'rule' => array('custom','/^(([a-zA-Z0-9])+(\-){0,1}){0,}([a-zA-Z0-9])+$/'),
          'message' => __('The appeal slug should not contain any spaces or special chars')
        )
      ),
      'status' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('What is the status of this appeal?')
        ),
        'valid' => array(
          'required' => true,
          'allowEmpty' => false,
          'rule' => array('inList', array('draft','published','archived')),
          'message' => __('Please enter a appeal status')
        )
      ) 
    );
  }

  public function getBySlug($slug='default') {
    $conditions = array('slug' => $slug, 'status' => array('published'));
    if (User::isAdmin()) {
      $conditions['status'][] = 'draft';
    }
    $appeal = $this->find('first', array('conditions' => $conditions));
    if (empty($appeal)) {
      $conditions['slug'] = 'default';
      $appeal = $this->find('first', array('conditions' => $conditions));
    }
    return $appeal;
  }

  public function getStatusOptions() {
    // todo from schema
    return array('draft'=>'draft','published'=>'published','archived'=>'archived');
  }
}

