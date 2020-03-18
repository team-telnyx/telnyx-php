<?php

namespace Telnyx;

/**
 * Class Address
 *
 * @package Telnyx
 */
class Address extends ApiResource
{
    const OBJECT_NAME = "address";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    
    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
        // Replace dots with slashes for namespaced resources, e.g. if the object's name is
        // "foo.bar", then its URL will be "/v2/foo/bar".
        // NOTE: This endpoint is special because object name is "address" and endpoint is "addresses"
        return "/v2/addresses";
    }
}
