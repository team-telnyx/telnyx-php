<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data\Payload;

/**
 * Whether recording was recorded in `single` or `dual` channel.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
