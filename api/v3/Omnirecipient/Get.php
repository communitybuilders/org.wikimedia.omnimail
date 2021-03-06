<?php
/**
 * Created by IntelliJ IDEA.
 * User: emcnaughton
 * Date: 5/3/17
 * Time: 12:46 PM
 */
// Include the library
require_once 'vendor/autoload.php';

// Require the Silverpop Namespace
use Omnimail\Omnimail;

/**
 * Get details about Omnimails.
 *
 * @param $params
 *
 * @return array
 */
function civicrm_api3_omnirecipient_get($params) {
  $result = CRM_Omnimail_Omnirecipients::getResult($params);

  if ($result->isCompleted()) {
    $values = $result->getData();
    return civicrm_api3_create_success($values);
  }
  else {
    $outcome = civicrm_api3_create_success(array());
    $outcome['retrieval_criteria'] = $result->getRetrievalParameters();
    return $outcome;
  }
}

/**
 * Get details about Omnimails.
 *
 * @param $params
 */
function _civicrm_api3_omnirecipient_get_spec(&$params) {
  $params['username'] = array(
    'title' => ts('User name'),
  );
  $params['password'] = array(
    'title' => ts('Password'),
  );
  $params['mail_provider'] = array(
    'title' => ts('Name of Mailer'),
    'api.required' => TRUE,
  );
  $params['start_date'] = array(
    'title' => ts('Date to fetch from'),
    'api.default' => '3 days ago',
    'type' => CRM_Utils_Type::T_TIMESTAMP,
  );
  $params['end_date'] = array(
    'title' => ts('Date to fetch to'),
    'type' => CRM_Utils_Type::T_TIMESTAMP,
  );
  $params['mailing_external_identifier'] = array(
    'title' => ts('Identifier for the mailing'),
    'type' => CRM_Utils_Type::T_STRING,
  );
  $params['retrieval_parameters'] = array(
    'title' => ts('Additional information for retrieval of pre-stored requests'),
  );

}
