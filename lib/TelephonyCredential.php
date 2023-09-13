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

        // This is basically the first half of Telnyx\ApiOperations\Request::_staticRequest() and we don't interpret as json unless there's an error
        $opts = \Telnyx\Util\RequestOptions::parse($options);
        $baseUrl = isset($opts->apiBase) ? $opts->apiBase : static::baseUrl();
        $requestor = new \Telnyx\ApiRequestor($opts->apiKey, $baseUrl);

        // Instead of calling the neatly packaged request() function, we're calling _requestRaw()
        list($rbody, $rcode, $rheaders, $myApiKey) = $requestor->_requestRaw('post', $url, $params, $headers);

        // Remove headers that don't need to be persistent across other requests
        $opts->discardNonPersistentHeaders();

        if ($rcode < 200 || $rcode >= 300) { // If there is an error then we need to interpret as a json and return the error object
            $json = $requestor->_interpretResponse($rbody, $rcode, $rheaders);
            $resp = new ApiResponse($rbody, $rcode, $rheaders, $json);

            return $resp;
        }
        else { // Default response: raw token as string
            return $rbody;
        }
    }
}
