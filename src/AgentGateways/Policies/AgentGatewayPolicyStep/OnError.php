<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep;

/**
 * What happens when the guardrail errors. Left out, the same as `on_fail`.
 */
enum OnError: string
{
    case NEXT = 'next';

    case ALLOW = 'allow';

    case BLOCK = 'block';

    case RESPOND = 'respond';
}
