<?php

return array(
  'name' => 'Honeybadger.io',
  'apiVersion' => '1.0',
  'baseUrl' => 'https://www.honeybadger.io/v1/',
  'description' => 'Honeybadger.io is an online error management service.',
  'operations' => array(
    'Notice' => array(
      'description' => 'Send a notice to be logged.',
      'httpMethod' => 'POST',
      'uri' => 'notices',
      'parameters' => array(
        'notifier' => array(
          'description' => 'Information about the notifier plugin',
          'location' => 'json',
          'type' => 'object',
          'required' => true,
          'properties' => array(
            'name' => array(
              'description' => 'The name of the notifier plugin',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'url' => array(
              'description' => 'The URL of the notifier plugin, should be different from the ',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'version' => array(
              'description' => 'Should be set to 1.3.0, per https://www.honeybadger.io/pages/collector',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
          ),
        ),
        'error' => array(
          'description' => 'Information about the error',
          'location' => 'json',
          'type' => 'object',
          'required' => true,
          'properties' => array(
            'class' => array(
              'description' => 'The error class, i.e. RuntimeError',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'message' => array(
              'description' => 'The error message',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
          ),
        ),
        'request' => array(
          'description' => 'Information about the request',
          'location' => 'json',
          'type' => 'object',
          'required' => true,
          'properties' => array(
            'url' => array(
              'description' => 'The URL of the request',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'component' => array(
              'description' => 'The component of the request',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'action' => array(
              'description' => 'The action of the request',
              'location' => 'json',
              'type' => 'string',
              'required' => true,
            ),
            'params' => array(
              'description' => 'The request parameters',
              'location' => 'json',
              'type' => 'object',
              'required' => true,
            ),



          ),
        ),
      ),
    ),
  ),
);
