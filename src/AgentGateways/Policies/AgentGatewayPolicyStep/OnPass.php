<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep;

/**
 * What happens when the guardrail passes. `next` goes on to the next step, `allow` allows the request, `block` blocks it, and `respond` answers with `message`.
 */
enum OnPass: string
{
    case NEXT = 'next';

    case ALLOW = 'allow';

    case BLOCK = 'block';

    case RESPOND = 'respond';
}
