<?php

declare(strict_types=1);

namespace Telnyx\Texml\TexmlInitiateAICallParams;

/**
 * HTTP request type used for `StatusCallback` and `StatusCallbacks` for this AI call. When provided, this per-call value overrides the status callback method configured on the TeXML application/connection.
 */
enum StatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
