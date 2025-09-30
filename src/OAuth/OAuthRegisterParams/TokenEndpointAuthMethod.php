<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthRegisterParams;

/**
 * Authentication method for the token endpoint.
 */
enum TokenEndpointAuthMethod: string
{
    case NONE = 'none';

    case CLIENT_SECRET_BASIC = 'client_secret_basic';

    case CLIENT_SECRET_POST = 'client_secret_post';
}
