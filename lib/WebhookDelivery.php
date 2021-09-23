<?php

namespace Telnyx;

/**
 * Class WebhookDelivery
 *
 * @package Telnyx
 */
class WebhookDelivery extends ApiResource
{
    const OBJECT_NAME = "webhook_delivery";

    use ApiOperations\All;
    use ApiOperations\Retrieve;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        // Original function inside ApiResource.php
        return "/v2/webhook_deliveries";
    }

}
