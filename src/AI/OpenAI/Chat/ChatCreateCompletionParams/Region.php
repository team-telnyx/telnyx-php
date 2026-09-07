<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams;

/**
 * Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
 */
enum Region: string
{
    case USA = 'USA';

    case EU = 'EU';

    case AUS = 'AUS';

    case UAE = 'UAE';
}
