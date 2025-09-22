<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuthClients\OAuthClientListResponse\Data;

/**
 * OAuth client type.
 */
enum ClientType: string
{
    case PUBLIC = 'public';

    case CONFIDENTIAL = 'confidential';
}
