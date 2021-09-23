<?php

namespace Telnyx;

/**
 * Class Document
 *
 * @package Telnyx
 */
class Document extends ApiResource
{
    const OBJECT_NAME = "document";

    use ApiOperations\All;
    use ApiOperations\Create{
        create as upload; // Alias for upload()
    }
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;
    
    /**
     * Download a document
     * 
     * Download a document.
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return
     */
    public function download($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/download';

        $params = $params ?: [];
        $headers = $options ?: [];

        list($resp, $rsuccess, $rcode, $rheaders, $opts) = static::_staticRequestRaw('get', $url, $params, $headers);
        return $resp;
    }
}
