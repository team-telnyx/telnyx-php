<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClientGetResponse\Data;

enum AllowedGrantType: string
{
    case CLIENT_CREDENTIALS = 'client_credentials';

    case AUTHORIZATION_CODE = 'authorization_code';

    case REFRESH_TOKEN = 'refresh_token';
}
