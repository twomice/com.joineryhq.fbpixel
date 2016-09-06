<?php

class CRM_Fbpixel_BAO_Rule extends CRM_Fbpixel_DAO_Rule {

  /**
   * Create a new Rule based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Fbpixel_DAO_Rule|NULL
   *
  public static function create($params) {
    $className = 'CRM_Fbpixel_DAO_Rule';
    $entityName = 'Rule';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */
}
