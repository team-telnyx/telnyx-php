<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnection;

/**
 * Determines which webhook format will be used, Telnyx API v1 or v2.
 */
enum WebhookAPIVersion: string
{
    case V1 = '1';

    case V2 = '2';
}
