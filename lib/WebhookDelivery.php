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
    const OBJECT_URL = "/v2/webhook_deliveries";

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
