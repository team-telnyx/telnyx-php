<?php

namespace Telnyx;

/**
 * Class WhatsAppMedia
 *
 * @package Telnyx
 */
class WhatsAppMedia extends ApiResource
{
    const OBJECT_NAME = "whatsapp_media_id";
    const OBJECT_URL = "/v2/whatsapp_media";

    use ApiOperations\Create{
        create as upload; // Alias for upload()
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
