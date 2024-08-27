<?php

namespace Telnyx;

use Telnyx\ApiOperations\Request;
use Telnyx\ApiResource;

class AccessIpAddress extends ApiResource
{
    const OBJECT_NAME = "access_ip_address";

  
    use ApiOperations\Request;
    use ApiOperations\All;

    public static function classUrl()
    {
        return '/v2/access_ip_address';
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return AccessIpAddress[]
     */
    public static function all()
    { 
        list($response, $opts) = static::_staticRequest('get',  static::classUrl(), null, null);

        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);

        return $obj;
    }
}