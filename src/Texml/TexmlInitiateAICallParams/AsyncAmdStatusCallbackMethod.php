<?php

declare(strict_types=1);

namespace Telnyx\Texml\TexmlInitiateAICallParams;

/**
 * HTTP request type used for `AsyncAmdStatusCallback`.
 */
enum AsyncAmdStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
