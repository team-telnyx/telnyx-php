<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClientCreateParams;

/**
 * OAuth client type.
 */
enum ClientType: string
{
    case PUBLIC = 'public';

    case CONFIDENTIAL = 'confidential';
}
