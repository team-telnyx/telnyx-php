<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClient;

/**
 * Record type identifier.
 */
enum RecordType: string
{
    case OAUTH_CLIENT = 'oauth_client';
}
