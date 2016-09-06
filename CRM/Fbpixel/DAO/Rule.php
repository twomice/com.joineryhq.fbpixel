<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2016                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/

/**
 * @package Fbpixel
 */

require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Fbpixel_DAO_Rule extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_fbpixel_rule';
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Unique Rule ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Entity on which to display pixel
   *
   * @var string
   */
  public $entity;
  /**
   * Page on which to display pixel
   *
   * @var string
   */
  public $page;
  /**
   * The Facebook pixel event to implement
   *
   * @var string
   */
  public $event;
  /**
   * Query parameters to send along with the pixel
   *
   * @var text
   */
  public $params;
  /**
   * Is this rule active?
   *
   * @var boolean
   */
  public $is_active;
  /**
   * class constructor
   *
   * @return civicrm_fbpixel_rule
   */
  function __construct() {
    $this->__table = 'civicrm_fbpixel_rule';
    parent::__construct();
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'Unique Rule ID',
          'required' => true,
        ) ,
        'entity' => array(
          'name' => 'entity',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity') ,
          'description' => 'Entity on which to display pixel',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'page' => array(
          'name' => 'page',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('page') ,
          'description' => 'Page on which to display pixel',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'event' => array(
          'name' => 'event',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Event') ,
          'description' => 'The Facebook pixel event to implement',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'params' => array(
          'name' => 'params',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Params') ,
          'description' => 'Query parameters to send along with the pixel',
        ) ,
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Active') ,
          'description' => 'Is this rule active?',
          'html' => array(
            'type' => 'CheckBox',
          ),
        ),
      );
    }
    return Civi::$statics[__CLASS__]['fields'];
  }
  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'fbpixel_rule', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'fbpixel_rule', $prefix, array());
    return $r;
  }
}