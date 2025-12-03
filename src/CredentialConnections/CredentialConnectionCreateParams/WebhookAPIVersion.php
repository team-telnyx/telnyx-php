<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialConnectionCreateParams;

/**
 * Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
 */
enum WebhookAPIVersion: string
{
    case _1 = '1';

    case _2 = '2';

    case TEXML = 'texml';
}
