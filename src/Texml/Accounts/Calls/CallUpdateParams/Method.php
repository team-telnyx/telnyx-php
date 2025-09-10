<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallUpdateParams;

/**
 * HTTP request type used for `Url`.
 */
enum Method: string
{
    case GET = 'GET';

    case POST = 'POST';
}
