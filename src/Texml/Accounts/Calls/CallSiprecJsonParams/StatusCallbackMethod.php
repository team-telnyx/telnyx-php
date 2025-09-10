<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams;

/**
 * HTTP request type used for `StatusCallback`.
 */
enum StatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
