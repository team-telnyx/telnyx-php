<?php

namespace Telnyx;

/**
 * Class WhatsAppMedia
 *
 * @package Telnyx
 */
class WhatsAppMedia extends ApiResource
{
    const OBJECT_NAME = "whatsapp_media_id"; // The record_type is 'whatsapp_media_id' and the endpoint is 'whatsapp_media' which is changed in classUrl() below

    use ApiOperations\Create{
        create as upload; // Alias for upload()
    }

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // Original function inside ApiResource.php
        return "/v2/whatsapp_media";
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
    public static function download($whatsapp_user_id, $media_id, $params = null, $options = null)
    {
        $url = static::classUrl() . '/' . $whatsapp_user_id . '/' . $media_id . '/download';

        $params = $params ?: [];
        $headers = $options ?: [];

        list($resp, $rsuccess, $rcode, $rheaders, $opts) = static::_staticRequestRaw('get', $url, $params, $headers);
        return $resp;
    }

    /**
     * Delete Media
     * 
     * Delete uploaded media.
     * 
     * Derived from: /lib/ApiOperations/Delete.php
     *
     * @param string|null $whatsapp_user_id
     * @param string|null $media_id
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Telnyx\ApiResource The updated resource.
     */
    public static function delete($whatsapp_user_id, $media_id, $params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = static::classUrl() . '/' . $whatsapp_user_id . '/' . $media_id;

        list($response, $opts) = static::_staticRequest('delete', $url, $params, $opts);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
