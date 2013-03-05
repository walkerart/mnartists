<?php

/**
 * @file
 * Provides FAPI implementation for a phone element.
 */

/**
 * Implements hook_element_info().
 */
function _phone_element_info() {
  $path = drupal_get_path('module', 'phone');

  $types['phone'] = array(
    '#input' => TRUE,
    '#process' => array('ajax_process_form', 'phone_element_process'),
    '#element_validate' => array('phone_element_validate'),
    '#theme_wrappers' => array('form_element'),
    '#attached' => array(
      'css' => array($path . '/theme/phone.css'),
    ),
    '#phone_settings' => array(
      'use_tel_input' => TRUE,
      'number_size' => 15,
      'comment_allowed_values' => array(
        'home' => t('Home'),
        'work' => t('Work'),
        'mobile' => t('Mobile'),
        'fax' => t('Fax'),
      ),
      'bubble_errors' => FALSE,
      'enable_comment' => TRUE,
      'comment_allowed_values_position' => 'before',
      'enable_extension' => FALSE,
      'extension_size' => 6,
      'country_options' => array(
        'enable_default_country' => TRUE,
        'default_country' => NULL,
        'all_country_codes' => TRUE,
        'country_codes' => array(
          'hide_single_cc' => FALSE,
          'country_selection' => array(),
        ),
        'country_code_position' => 'after',
      ),
    ),
  );

  $types['phone_tel'] = array(
    '#input' => TRUE,
    '#size' => 30,
    '#maxlength' => 128,
    '#autocomplete_path' => FALSE,
    '#process' => array('ajax_process_form'),
    '#theme' => 'phone_tel',
    '#theme_wrappers' => array('form_element'),
  );

  return $types;
}

/**
 * Process an individual phone element.
 */
function phone_element_process($element, &$form_state, $form) {
  $item = $element['#value'];

  $settings = $element['#phone_settings'];

  if ($settings['enable_comment'] && !empty($settings['comment_allowed_values'])) {
    $element['comment'] = array(
      '#type' => 'select',
      '#options' => $settings['comment_allowed_values'],
      '#weight' => $settings['comment_allowed_values_position'] == 'after' ? 5 : -5,
      '#empty_option' => t('- Select -'),
      '#default_value' => isset($item['comment']) ? $item['comment'] : NULL,
    );
  }
  else {
    $element['comment'] = array(
      '#type' => 'hidden',
      '#value' => isset($item['comment']) ? $item['comment'] : NULL,
    );
  }

  $element['number'] = array(
    '#type' => !empty($settings['use_tel_input']) ? 'phone_tel' : 'textfield',
    '#maxlength' => $settings['number_size'],
    '#size' => $settings['number_size'],
    '#required' => ($element['#delta'] == 0 && $element['#required']) ? $element['#required'] : FALSE,
    '#default_value' => isset($item['number']) ? $item['number'] : NULL,
    '#weight' => 0,
  );

  // If only one country code, make it as a hidden form item.
  $country_options = $settings['country_options'];
  $country_selection = array_filter($country_options['country_codes']['country_selection']);
  if (!$country_options['all_country_codes'] && count($country_selection) == 1) {
    $countrycode = reset($country_selection);
    $country = phone_countries($countrycode);
    $element['countrycode'] = array(
      '#type' => 'hidden',
      '#value' => $countrycode,
    );
    if (!$country_options['country_codes']['hide_single_cc']) {
      $element['country_code_markup'] = array(
        '#type' => 'item',
        '#markup' => $value = $country,
        '#weight' => ($country_options['country_code_position'] == 'after' ? 1 : -1),
      );
    }
  }
  else {
    $element['countrycode'] = array(
      '#type' => 'select',
      '#options' => phone_countries($country_options['all_country_codes'] ? NULL : $country_selection),
      '#weight' => ($country_options['country_code_position'] == 'after' ? 1 : -1),
      '#empty_option' => t('- Guess from number -'),
    );
    if (isset($item['countrycode'])) {
      $element['countrycode']['#default_value'] = $item['countrycode'];
    }
    elseif ($country_options['enable_default_country']) {
      $element['countrycode']['#default_value'] = $country_options['default_country'];
    }
  }

  if ($settings['enable_extension']) {
    $element['extension'] = array(
      '#type' => 'textfield',
      '#maxlength' => $settings['extension_size'],
      '#size' => $settings['extension_size'],
      '#title' => t('ext'),
      '#required' => FALSE,
      '#default_value' => isset($item['extension']) ? $item['extension'] : NULL,
      '#weight' => 2,
    );
  }
  else {
    $element['extension'] = array(
      '#type' => 'hidden',
      '#value' => isset($item['extension']) ? $item['extension'] : NULL,
    );
  }

  return $element;
}

/**
 * An #element_validate callback for the phone element.
 */
function phone_element_validate(&$element, &$form_state) {
  // Load up libphonenumer.
  phone_libphonenumber();

  $item = $element['#value'];
  if (isset($item['number'])) {
    $phone_input = trim($item['number']);
  }
  if (isset($item['countrycode'])) {
    $countrycode = trim($item['countrycode']);
  }
  $ext_input = '';
  $settings = $element['#phone_settings'];

  if ($settings['enable_extension'] && isset($item['extension'])) {
    $ext_input = trim($item['extension']);
  }

  if (isset($phone_input) && !empty($phone_input)) {
    $all_countries = $settings['country_options']['all_country_codes'];
    $selection = array_filter($settings['country_options']['country_codes']['country_selection']);
    $valid = phone_libphonenumber_valid($phone_input, $countrycode, $ext_input, $all_countries, $selection);
    if (TRUE !== $valid) {
      // If this is used in a field widget, bubble the errors to be handled
      // by hook_field_validate(). We can set a more useful message there
      // as we'll have full access to the field information, and won't have
      // to write complex code here to handle the case when this is used
      // as it's own FAPI element outside of the field system.
      if (isset($settings['bubble_errors']) && $settings['bubble_errors'] === TRUE) {
        $dummy_element = array(
          '#parents' => array_merge($element['#parents'], array('error')),
        );
        form_set_value($dummy_element, $valid, $form_state);
      }
      else {
        form_error($element, t('%name: !error', array('%name' => $element['#title'], '!error' => $valid)));
      }
    }
  }
}

/**
 * Returns HTML for a tel form element.
 *
 * @param array $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties of the element.
 *     Properties used: #title, #value, #description, #size, #maxlength,
 *     #placeholder, #required, #attributes, #autocomplete_path.
 *
 * @ingroup themeable
 */
function theme_phone_tel($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'tel';
  element_set_attributes($element, array(
    'id', 'name', 'value', 'size',
    'maxlength', 'placeholder',
  ));
  _form_set_class($element, array('form-phone-tel'));
  _form_set_class($element, array('form-text'));

  $extra = '';
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output . $extra;
}
