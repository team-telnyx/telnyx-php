<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

/**
 * Delivery status: 'delivered' when successfuly delivered or 'failed' if all attempts have failed.
 */
enum Status: string
{
    case DELIVERED = 'delivered';

    case FAILED = 'failed';
}
