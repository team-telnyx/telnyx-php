<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
 */
enum URLMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
