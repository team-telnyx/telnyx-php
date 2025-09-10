<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallUpdateParams;

/**
 * HTTP request type used for `FallbackUrl`.
 */
enum FallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
