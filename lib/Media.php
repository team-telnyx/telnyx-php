<?php

namespace Telnyx;

/**
 * Class Media
 *
 * @package Telnyx
 */
class Media extends ApiResource
{
    const OBJECT_NAME = "media";

    use ApiOperations\All;
    use ApiOperations\Create{
        create as upload; // Alias for upload()
    }
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // Original function inside ApiResource.php
        return "/v2/media";
    }
    
    /**
     * Download Media
     * 
     * Retrieve uploaded media. Media is typically available for 30 days after uploading.
     *
     * @param string|null $whatsapp_user_id
     * @param string|null $media_id
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return
     */
    public static function download($media_name, $params = null, $options = null)
    {
        $url = static::classUrl() . '/' . $media_name . '/download';

        $params = $params ?: [];
        $headers = $options ?: [];

        // This is basically the first half of Telnyx\ApiOperations\Request::_staticRequest() and we don't interpret as json unless there's an error
        $opts = \Telnyx\Util\RequestOptions::parse($options);
        $baseUrl = isset($opts->apiBase) ? $opts->apiBase : static::baseUrl();
        $requestor = new \Telnyx\ApiRequestor($opts->apiKey, $baseUrl);

        // Instead of calling the neatly packaged request() function, we're calling _requestRaw()
        list($rbody, $rcode, $rheaders, $myApiKey) = $requestor->_requestRaw('get', $url, $params, $headers);

        // Remove headers that don't need to be persistent across other requests
        $opts->discardNonPersistentHeaders();

        if ($rcode < 200 || $rcode >= 300) { // If there is an error then we need to interpret as a json and return the error object
            $json = $requestor->_interpretResponse($rbody, $rcode, $rheaders);
            $resp = new ApiResponse($rbody, $rcode, $rheaders, $json);

            return $resp;
        }
        else { // Default response: raw download as string
            return $rbody;
        }
    }
    
}
