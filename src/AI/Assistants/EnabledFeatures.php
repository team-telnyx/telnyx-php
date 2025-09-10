<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

/**
 * If `telephony` is enabled, the assistant will be able to make and receive calls. If `messaging` is enabled, the assistant will be able to send and receive messages.
 */
enum EnabledFeatures: string
{
    case TELEPHONY = 'telephony';

    case MESSAGING = 'messaging';
}
