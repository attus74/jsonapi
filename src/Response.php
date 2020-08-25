<?php

namespace Attus\JsonApi;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * JSON:API Response
 * 
 * @author Attila Németh, UBG
 * @date 24.08.2020
 */
class Response extends JsonResponse {
  
  public function __construct($data = null, $status = 200, $headers = array(), $json = false)
  {
    if (!(is_array($data) && array_key_exists('data', $data))) {
      $data = [
        'data' => $data,
      ];
    }
    $data += [
      'jsonapi' => [
        'version' => '1.1',
        'meta' => [
          'links' => [
            'self' => [
              'href' => 'http://jsonapi.org/format/1.1/',
            ],
          ],
        ],
      ],
    ];
    return parent::__construct($data, $status, $headers, $json);
  }
  
}
