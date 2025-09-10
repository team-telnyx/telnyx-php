<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionUpdateParams;

/**
 * Determines which webhook format will be used, Telnyx API v1 or v2.
 */
enum WebhookAPIVersion: string
{
    case WEBHOOK_API_VERSION_1 = '1';

    case WEBHOOK_API_VERSION_2 = '2';
}
