<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceEndedWebhookEvent\Data\Payload;

/**
 * Reason the conference ended.
 */
enum Reason: string
{
    case ALL_LEFT = 'all_left';

    case HOST_LEFT = 'host_left';

    case TIME_EXCEEDED = 'time_exceeded';
}
