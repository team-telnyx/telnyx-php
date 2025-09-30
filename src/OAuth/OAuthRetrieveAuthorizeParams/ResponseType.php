<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthRetrieveAuthorizeParams;

/**
 * OAuth response type.
 */
enum ResponseType: string
{
    case CODE = 'code';
}
