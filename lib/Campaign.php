<?php

namespace Telnyx;

/**
 * Class Campaign
 *
 * @package Telnyx
 */
class Campaign extends ApiResource
{
    const OBJECT_NAME = "campaign";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    
    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
        // Use a custom URL for this resource
        // NOTE: This endpoint is special because object name is "campaign" and endpoint is "campaign"
        // NOTE: This endpoint is special because domain 10dlc is used and not v2
        return "/10dlc/campaign";
    }
    public function mnoMetadata($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/mnoMetadata';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
    public function operationStatus($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/operationStatus';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
