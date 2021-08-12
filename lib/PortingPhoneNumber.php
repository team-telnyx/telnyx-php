<?php

namespace Telnyx;

/**
 * Class PortingPhoneNumber
 *
 * @package Telnyx
 */
class PortingPhoneNumber extends ApiResource
{
    const OBJECT_NAME = "number_order_phone_number";

    use ApiOperations\All;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // NOTE: This function override compensates for the different way this endpoint is spelled.
        // 'faxs' vs 'faxes'
        // Original function inside ApiResource.php
        return "/v2/porting_phone_numbers";
    }
}
