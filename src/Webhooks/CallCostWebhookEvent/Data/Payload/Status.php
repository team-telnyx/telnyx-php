<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallCostWebhookEvent\Data\Payload;

/**
 * The status of the cost calculation (`success` or `error`).
 */
enum Status: string
{
    case SUCCESS = 'success';

    case ERROR = 'error';
}
