<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithTeXml;

/**
 * HTTP request type used for `DeepfakeDetectionCallbackUrl`.
 */
enum DeepfakeDetectionCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
