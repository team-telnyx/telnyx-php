<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuth\OAuthTokenResponse;

/**
 * Token type.
 */
enum TokenType: string
{
    case BEARER = 'Bearer';
}
