<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuthGrants\OAuthGrantDeleteResponse\Data;

/**
 * Record type identifier.
 */
enum RecordType: string
{
    case OAUTH_GRANT = 'oauth_grant';
}
