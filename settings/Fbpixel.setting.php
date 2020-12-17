<?php

use CRM_Fbpixel_ExtensionUtil as E;

return array(
  'fbpixel_pixel_id' => array(
    'group_name' => 'Facebook Pixel',
    'group' => 'fbpixel',
    'name' => 'fbpixel_pixel_id',
    'type' => 'String',
    'add' => '4.7',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => E::ts(''),
    'title' => E::ts('Facebook Pixel ID'),
    'help_text' => '',
    'html_type' => 'Text',
    'html_attributes' => array(),
    'quick_form_type' => 'Element',
  ),
);
