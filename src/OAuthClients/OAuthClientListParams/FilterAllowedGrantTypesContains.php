<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClientListParams;

/**
 * Filter by allowed grant type.
 */
enum FilterAllowedGrantTypesContains: string
{
    case CLIENT_CREDENTIALS = 'client_credentials';

    case AUTHORIZATION_CODE = 'authorization_code';

    case REFRESH_TOKEN = 'refresh_token';
}
