<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline;

/**
 * `before_request` runs the steps on the request, and `after_request` on the model's response.
 */
enum Hook: string
{
    case BEFORE_REQUEST = 'before_request';

    case AFTER_REQUEST = 'after_request';
}
