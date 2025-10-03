<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionCreateParams;

/**
 * Determines which webhook format will be used, Telnyx API v1 or v2.
 */
enum WebhookAPIVersion: string
{
    case _1 = '1';

    case _2 = '2';
}
