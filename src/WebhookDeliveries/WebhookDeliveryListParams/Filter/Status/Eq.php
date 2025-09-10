<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status;

/**
 * Return only webhook_deliveries matching the given `status`.
 */
enum Eq: string
{
    case DELIVERED = 'delivered';

    case FAILED = 'failed';
}
