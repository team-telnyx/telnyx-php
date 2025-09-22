<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthTokenParams;

/**
 * OAuth 2.0 grant type.
 */
enum GrantType: string
{
    case CLIENT_CREDENTIALS = 'client_credentials';

    case AUTHORIZATION_CODE = 'authorization_code';

    case REFRESH_TOKEN = 'refresh_token';
}
