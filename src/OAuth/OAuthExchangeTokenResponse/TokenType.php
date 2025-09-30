<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthExchangeTokenResponse;

/**
 * Token type.
 */
enum TokenType: string
{
    case BEARER = 'Bearer';
}
