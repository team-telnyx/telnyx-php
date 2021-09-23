<?php

namespace Telnyx;

/**
 * Class Balance
 *
 * @package Telnyx
 */
class Balance extends ApiResource
{
    const OBJECT_NAME = "balance";
    const OBJECT_URL = "/v2/balance";

    use ApiOperations\Retrieve;

    /**
     * @param string|null $id
     *
     * @return Retrieve user balance details
     */
    public static function retrieve()
    {
        list($response, $opts) = static::_staticRequest('get', static::classUrl(), null, null);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }
}
