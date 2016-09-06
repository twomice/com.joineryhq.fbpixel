<?php

require_once 'CRM/Core/Page.php';

class CRM_Fbpixel_Page_Rules extends CRM_Core_Page_Basic {
  public $useLivePageJS = TRUE;

  /**
   * The action links that we need to display for the browse screen
   *
   * @var array
   * @static
   */
  static $_links = NULL;

  /**
   * Get BAO Name
   *
   * @return string Classname of BAO.
   */
  function getBAOName() {
    return 'CRM_Fbpixel_BAO_Rule';
  }

  /**
   * Get action Links
   *
   * @return array (reference) of action links
   */
  function &links() {
    if (!(self::$_links)) {
      self::$_links = array(
        CRM_Core_Action::VIEW => array(
          'name' => ts('View'),
          'url' => 'civicrm/admin/fbpixel/rule/view',
          'qs' => 'id=%%id%%&reset=1',
          'title' => ts('View Fbpixel Rule')
        ),
        CRM_Core_Action::UPDATE => array(
          'name' => ts('Edit'),
          'url' => 'civicrm/admin/fbpixel/rule/edit',
          'qs' => '&id=%%id%%&reset=1',
          'title' => ts('Edit Fbpixel Rule')
        ),
        CRM_Core_Action::DISABLE => array(
          'name' => ts('Disable'),
          'class' => 'crm-enable-disable',
          'title' => ts('Disable Fbpixel Rule')
        ),
        CRM_Core_Action::ENABLE => array(
          'name' => ts('Enable'),
          'class' => 'crm-enable-disable',
          'title' => ts('Enable Fbpixel Rule')
        ),
        CRM_Core_Action::DELETE => array(
          'name' => ts('Delete'),
          'url' => 'civicrm/admin/fbpixel/rule/delete',
          'qs' => '&id=%%id%%',
          'title' => ts('Delete Fbpixel Rule')
        )
      );
    }
    return self::$_links;
  }

  /**
   * Get name of edit form
   *
   * @return string Classname of edit form.
   */
  function editForm() {
    return 'CRM_Fbpixel_Form_Rule';
  }

  /**
   * Get edit form name
   *
   * @return string name of this page.
   */
  function editName() {
    return ts('Fbpixel Rule');
  }

  /**
   * Get user context.
   *
   * @return string user context.
   */
  function userContext($mode = NULL) {
    return 'civicrm/admin/fbpixel/rules';
  }
}
