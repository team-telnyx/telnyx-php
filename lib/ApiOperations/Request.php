<?php

namespace Telnyx\ApiOperations;

/**
 * Trait for resources that need to make API requests.
 *
 * This trait should only be applied to classes that derive from TelnyxObject.
 */
trait Request
{
    /**
     * @param array|null|mixed $params The list of parameters to validate
     *
     * @throws \Telnyx\Exception\InvalidArgumentException if $params exists and is not an array
     */
    protected static function _validateParams($params = null)
    {
        if ($params && !is_array($params)) {
            $message = "You must pass an array as the first argument to Telnyx API "
               . "method calls.  (HINT: an example call to create a call "
               . "would be: \"Telnyx\\Call::create(['connection_id' => 'uuid', 'to'"
               . "=> '+18005550199', 'from' => '+18005550100'])\")";
            throw new \Telnyx\Exception\InvalidArgumentException($message);
        }
    }

    /**
     * @param string $method HTTP method ('get', 'post', etc.)
     * @param string $url URL for the request
     * @param array $params list of parameters for the request
     * @param array|string|null $options
     *
     * @return array tuple containing (the JSON response, $options)
     */
    protected function _request($method, $url, $params = [], $options = null)
    {
        $opts = $this->_opts->merge($options);
        list($resp, $options) = static::_staticRequest($method, $url, $params, $opts);
        $this->setLastResponse($resp);
        return [$resp->json, $options];
    }

    /**
     * @param string $method HTTP method ('get', 'post', etc.)
     * @param string $url URL for the request
     * @param array $params list of parameters for the request
     * @param array|string|null $options
     *
     * @return array tuple containing (the JSON response, $options)
     */
    protected static function _staticRequest($method, $url, $params, $options)
    {
        $opts = \Telnyx\Util\RequestOptions::parse($options);
        $baseUrl = isset($opts->apiBase) ? $opts->apiBase : static::baseUrl();
        $requestor = new \Telnyx\ApiRequestor($opts->apiKey, $baseUrl);
        list($response, $opts->apiKey) = $requestor->request($method, $url, $params, $opts->headers);
        $opts->discardNonPersistentHeaders();
        return [$response, $opts];
    }

    /**
     * Same as _staticRequest(), but returns a raw String for success or an ApiResponse object on failure
     * 
     * @param string $method HTTP method ('get', 'post', etc.)
     * @param string $url URL for the request
     * @param array $params list of parameters for the request
     * @param array|string|null $options
     *
     * @return array tuple containing (Response String, Success, HTTP Response Code, Headers, Options)
     */
    protected static function _staticRequestRaw($method, $url, $params, $options)
    {
        $opts = \Telnyx\Util\RequestOptions::parse($options);
        $baseUrl = isset($opts->apiBase) ? $opts->apiBase : static::baseUrl();
        $requestor = new \Telnyx\ApiRequestor($opts->apiKey, $baseUrl);

        // Instead of calling the neatly packaged request() function, we're calling _requestRaw()
        list($rbody, $rcode, $rheaders, $myApiKey) = $requestor->_requestRaw($method, $url, $params, $opts->headers);

        // Remove headers that don't need to be persistent across other requests
        $opts->discardNonPersistentHeaders();

        if ($rcode < 200 || $rcode >= 300) { // If there is an error then we need to interpret as a json and return the error object
            $json = $requestor->_interpretResponse($rbody, $rcode, $rheaders);
            $resp = new ApiResponse($rbody, $rcode, $rheaders, $json);
            $rsuccess = false;
        }
        else { // Default response: raw download as string
            $resp = $rbody;
            $rsuccess = true;
        }
        return [$resp, $rsuccess, $rcode, $rheaders, $opts];
    }
}
