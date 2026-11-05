<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline\Step;

/**
 * What happens when the guardrail fails.
 */
enum OnFail: string
{
    case NEXT = 'next';

    case ALLOW = 'allow';

    case BLOCK = 'block';

    case RESPOND = 'respond';
}
