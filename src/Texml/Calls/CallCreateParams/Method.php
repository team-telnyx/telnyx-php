<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls\CallCreateParams;

/**
 * HTTP method used to retrieve TeXML instructions from Url.
 */
enum Method: string
{
    case GET = 'GET';

    case POST = 'POST';
}
