<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthAuthorizeParams;

/**
 * OAuth response type.
 */
enum ResponseType: string
{
    case CODE = 'code';
}
