<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload1;

/**
 * The status of the fax.
 */
enum Status: string
{
    case DELIVERED = 'delivered';
}
