<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;

/**
 * HTTP method used to send status callbacks.
 */
enum StatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
