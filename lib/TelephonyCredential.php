<?php

namespace Telnyx;

/**
 * Class TelephonyCredential
 *
 * @package Telnyx
 */
class TelephonyCredential extends ApiResource
{
    const OBJECT_NAME = "credential";
    const OBJECT_URL = "/v2/telephony_credentials";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;

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
