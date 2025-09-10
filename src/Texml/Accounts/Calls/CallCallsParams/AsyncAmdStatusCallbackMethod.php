<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
 */
enum AsyncAmdStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
