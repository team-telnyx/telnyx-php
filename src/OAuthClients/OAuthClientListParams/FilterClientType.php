<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClientListParams;

/**
 * Filter by client type.
 */
enum FilterClientType: string
{
    case CONFIDENTIAL = 'confidential';

    case PUBLIC = 'public';
}
