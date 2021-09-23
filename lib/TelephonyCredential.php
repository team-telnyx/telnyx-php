<?php

namespace Telnyx;

/**
 * Class TelephonyCredential
 *
 * @package Telnyx
 */
class TelephonyCredential extends ApiResource
{
    const OBJECT_NAME = "credential"; // The record_type is 'credential' and the endpoint is /telephony_credentials which is changed in classUrl() below

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // NOTE: This function override compensates for the different way this endpoint is spelled.
        // 'faxs' vs 'faxes'
        // Original function inside ApiResource.php
        return "/v2/telephony_credentials";
    }

    /**
     * Create an Access Token (JWT) for the credential.
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return string
     */
    public function token($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/token';

        $params = $params ?: [];
        $headers = $options ?: [];

        list($resp, $rsuccess, $rcode, $rheaders, $opts) = static::_staticRequestRaw('post', $url, $params, $headers);
        return $resp;
    }
}
