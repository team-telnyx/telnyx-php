<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthRetrieveAuthorizeParams;

/**
 * PKCE code challenge method.
 */
enum CodeChallengeMethod: string
{
    case PLAIN = 'plain';

    case S256 = 'S256';
}
