<?php

require_once 'fbpixel.civix.php';
use CRM_Fbpixel_ExtensionUtil as E;

/**
 * Implements hook_civicrm_alterContent().
 */
function fbpixel_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  $pixel_id = CRM_Core_BAO_Setting::getItem('com.joineryhq.fbpixel', 'fbpixel_pixel_id');
  if (empty($pixel_id)) {
    // Nothing to do if pixel_id is not configured.
    return;
  }

  $extra_js = $extra_noscript = '';

  switch (get_class($object)) {
    case 'CRM_Event_Page_EventInfo':
      // view content
      $fb_params = array(
        'content_name' => "event-" . $object->_id,
        'content_type' => 'event',
        'content_ids' => $object->_id,
      );
      _fbpixel_append_event('ViewContent', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Event_Form_Registration_Register':
      // add to cart
      $fb_params = array(
        'value' => $object->_totalAmount,
        'currency' => $object->_values['event']['currency'],
        'content_name' => "event-" . $object->_eventId,
        'content_type' => 'event',
        'content_ids' => $object->_eventId,
        'num_items' => 1,
      );
      _fbpixel_append_event('AddToCart', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Event_Form_Registration_Confirm':
      $fb_params = array(
        'value' => $object->_totalAmount,
        'currency' => $object->_values['event']['currency'],
        'content_name' => "event-" . $object->_eventId,
        'content_category' => 'event',
        'content_ids' => $object->_eventId,
        'num_items' => 1,
      );
      _fbpixel_append_event('InitiateCheckout', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Event_Form_Registration_ThankYou':
      $fb_params = array(
        'value' => $object->_totalAmount,
        'currency' => $object->_values['event']['currency'],
        'content_name' => "event-" . $object->_eventId,
      );
      _fbpixel_append_event('CompleteRegistration', $fb_params, $extra_js, $extra_noscript);

      $fb_params = array(
        'value' => $object->_totalAmount,
        'currency' => $object->_values['event']['currency'],
        'content_name' => "event-" . $object->_eventId,
        'content_type' => 'event',
        'content_ids' => $object->_eventId,
        'num_items' => 1,
      );
      _fbpixel_append_event('Purchase', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Contribute_Form_Contribution_Main':
      // view content
      $fb_params = array(
        'content_name' => "contribution-" . $object->_id,
        'content_type' => 'contribution',
        'content_ids' => $object->_id,
      );
      _fbpixel_append_event('ViewContent', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Contribute_Form_Contribution_Confirm':
      $fb_params = array(
        'value' => $object->_amount,
        'currency' => $object->_values['currency'],
        'content_name' => "contribution-" . $object->_id,
        'content_category' => 'contribution',
        'content_ids' => $object->_id,
        'num_items' => 1,
      );
      _fbpixel_append_event('InitiateCheckout', $fb_params, $extra_js, $extra_noscript);
      break;

    case 'CRM_Contribute_Form_Contribution_ThankYou':
      $fb_params = array(
        'value' => $object->_amount,
        'currency' => $object->_values['currency'],
        'content_name' => "contribution-" . $object->_id,
        'content_type' => 'contribution',
        'content_ids' => $object->_id,
        'num_items' => 1,
      );
      _fbpixel_append_event('Purchase', $fb_params, $extra_js, $extra_noscript);
      break;
  }

  $fb_pixel_code = <<<EOT
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '$pixel_id');
    fbq('track', "PageView");
    $extra_js
    </script>
    <noscript>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=$pixel_id&ev=PageView&noscript=1"/>
      $extra_noscript
    </noscript>
    <!-- End Facebook Pixel Code -->
EOT;
  $content = $fb_pixel_code . $content;
  // Uncomment here to view pixel code at top of page. (This eases Selenium testing in Firefox.)
  // $content = '<pre>' . htmlentities($fb_pixel_code) . '</pre>' . $content;
}

/**
 * Implements hook_civicrm_pageRun().
 */
function fbpixel_civicrm_pageRun(&$page) {
  //  $resource = CRM_Core_Resources::singleton();
  //  $resource->addScriptFile('com.joineryhq.fbpixel', 'js/fbpixel.user.js');
  //  dsm($page, 'page');
}

/**
 * Implements hook_civicrm_buildForm().
 */
function fbpixel_civicrm_buildForm($formName, &$form) {
  //  $resource = CRM_Core_Resources::singleton();
  //  $resource->addScriptFile('com.joineryhq.fbpixel', 'js/fbpixel.user.js');
  //  dsm($form, $formName);
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function fbpixel_civicrm_config(&$config) {
  _fbpixel_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function fbpixel_civicrm_xmlMenu(&$files) {
  _fbpixel_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function fbpixel_civicrm_install() {
  return _fbpixel_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function fbpixel_civicrm_uninstall() {
  return _fbpixel_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function fbpixel_civicrm_enable() {
  return _fbpixel_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function fbpixel_civicrm_disable() {
  return _fbpixel_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function fbpixel_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _fbpixel_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function fbpixel_civicrm_managed(&$entities) {
  return _fbpixel_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function fbpixel_civicrm_caseTypes(&$caseTypes) {
  _fbpixel_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function fbpixel_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _fbpixel_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Append fbq() and noscript pixel code for the given event and parameters.
 *
 * @param string $event The relevant Facebook Pixel event.
 * @param array $params An array of key/value pairs for Facebook Pixel parameters to be sent with the event.
 * @param string $extra_js JavaScript code containing fbq() calls.
 * @param string $extra_noscript HTML code containing facebook pixel <img> tags.
 */
function _fbpixel_append_event($event, $params, &$extra_js, &$extra_noscript) {
  static $pixel_id;
  if (!isset($pixel_id)) {
    $pixel_id = CRM_Core_BAO_Setting::getItem('com.joineryhq.fbpixel', 'fbpixel_pixel_id');
  }

  $extra_js .= "fbq('track', '$event', " . json_encode($params) . ");\n";

  $noscript_params = array(
    'id' => $pixel_id,
    'ev' => $event,
    'noscript' => 1,
    'cd' => $params,
  );
  $extra_noscript .= '<img src="https://www.facebook.com/tr?' . http_build_query($noscript_params) . '" height="1" width="1" style="display:none"/>' . "\n";
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function fbpixel_civicrm_navigationMenu(&$menu) {
  _fbpixel_civix_insert_navigation_menu($menu, 'Administer/System Settings', array(
    'label' => E::ts('Facebook Pixel Tracking', array('domain' => 'com.joineryhq.fbpixel')),
    'name' => 'Facebook Pixel Tracking',
    'url' => 'civicrm/admin/fbpixel/settings',
    'permission' => 'administer CiviCRM',
    'operator' => 'AND',
    'separator' => NULL,
  ));
  _fbpixel_civix_navigationMenu($menu);
}
