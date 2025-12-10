<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt;

enum Status: string
{
    case DELIVERED = 'delivered';

    case FAILED = 'failed';
}
