<?php

require_once 'fbpixel.civix.php';

/**
 * Implementation of hook_civicrm_alterContent
 */
function fbpixel_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  $pixel_id = CRM_Core_BAO_Setting::getItem('com.joineryhq.fbpixel', 'pixel_id');
  $event_id = CRM_Core_BAO_Setting::getItem('com.joineryhq.fbpixel', 'event_id');
  
  $extra_js = $extra_noscript = '';

  if (get_class($object) == 'CRM_Event_Form_Registration_ThankYou' && $object->_eventId == $event_id) {
    $fb_params = array(
      'value' => $object->_totalAmount,
    );
    $extra_js .= "fbq('track', 'CompleteRegistration', ". json_encode($fb_params). ");";
    $extra_noscript .= "fbq('track', 'CompleteRegistration', ". json_encode($fb_params). ");";
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
}

/**
 * Implementation of hook_civicrm_pageRun
 */
function fbpixel_civicrm_pageRun(&$page) {
//  $resource = CRM_Core_Resources::singleton();
//  $resource->addScriptFile('com.joineryhq.fbpixel', 'js/fbpixel.user.js');
//  dsm($page, 'page');
}

/**
 * Implementation of hook_civicrm_buildForm
 */
function fbpixel_civicrm_buildForm($formName, &$form) {
//  $resource = CRM_Core_Resources::singleton();
//  $resource->addScriptFile('com.joineryhq.fbpixel', 'js/fbpixel.user.js');
//  dsm($form, $formName);
}

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function fbpixel_civicrm_config(&$config) {
  _fbpixel_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function fbpixel_civicrm_xmlMenu(&$files) {
  _fbpixel_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function fbpixel_civicrm_install() {
  return _fbpixel_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function fbpixel_civicrm_uninstall() {
  return _fbpixel_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function fbpixel_civicrm_enable() {
  return _fbpixel_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function fbpixel_civicrm_disable() {
  return _fbpixel_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function fbpixel_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _fbpixel_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
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
 * Implementation of hook_civicrm_caseTypes
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
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function fbpixel_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _fbpixel_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
