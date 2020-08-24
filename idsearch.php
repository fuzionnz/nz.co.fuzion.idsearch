<?php

require_once 'idsearch.civix.php';
use CRM_Idsearch_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function idsearch_civicrm_config(&$config) {
  _idsearch_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function idsearch_civicrm_xmlMenu(&$files) {
  _idsearch_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function idsearch_civicrm_install() {
  _idsearch_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function idsearch_civicrm_postInstall() {
  _idsearch_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function idsearch_civicrm_uninstall() {
  _idsearch_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function idsearch_civicrm_enable() {
  _idsearch_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function idsearch_civicrm_disable() {
  _idsearch_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function idsearch_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _idsearch_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function idsearch_civicrm_managed(&$entities) {
  _idsearch_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function idsearch_civicrm_caseTypes(&$caseTypes) {
  _idsearch_civix_civicrm_caseTypes($caseTypes);
}

function idsearch_civicrm_buildForm($formName, &$form) {
  $components = [
    'Activity' => [
      'form_name' => 'CRM_Activity_Form_Search',
      'insert_after' => 'priority_id',
    ],
    'Contribution' => [
      'form_name' => 'CRM_Contribute_Form_Search',
      'insert_after' => 'contribution_trxn_id',
    ],
    'Pledge' => [
      'form_name' => 'CRM_Pledge_Form_Search',
      'insert_after' => 'pledge_financial_type_id',
    ],
    'Participant' => [
      'form_name' => 'CRM_Event_Form_Search',
      'insert_after' => 'event_id',
    ],
    'Mailing' => [
      'form_name' => 'CRM_Mailing_Form_Search',
      'insert_after' => 'mailing_name',
    ],
    'Event' => [
      'form_name' => 'CRM_Event_Form_SearchEvent',
      'insert_after' => 'title',
    ],
  ];
  foreach ($components as $key => $component) {
    $cName = strtolower($key) . '_id';
    if ($formName == $component['form_name'] && !$form->elementExists($cName)) {
      $templatePath = realpath(dirname(__FILE__)."/templates");
      $form->assign('component_label', $key);
      $form->assign('component_name', $cName);
      $form->assign('insert_after_id', $component['insert_after']);
      $form->add('text', $cName, ts("$key ID"));
      CRM_Core_Region::instance('page-body')->add(array(
        'template' => "{$templatePath}/component.tpl"
      ));
    }
  }
}


/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function idsearch_civicrm_angularModules(&$angularModules) {
  _idsearch_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function idsearch_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _idsearch_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function idsearch_civicrm_entityTypes(&$entityTypes) {
  _idsearch_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function idsearch_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function idsearch_civicrm_navigationMenu(&$menu) {
  _idsearch_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _idsearch_civix_navigationMenu($menu);
} // */
