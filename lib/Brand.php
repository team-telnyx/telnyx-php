<?php

namespace Telnyx;

/**
 * Class Brand
 *
 * @package Telnyx
 */
class Brand extends ApiResource
{
    const OBJECT_NAME = "brand";

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
        // NOTE: This endpoint is special because domain 10dlc is used and not v2
        // NOTE: This endpoint is special because object name is "brand" and endpoint is "brands"
        return "/10dlc/brand";
    }
    public function revet($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/revet';
        list($response, $opts) = $this->_request('put', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

}
