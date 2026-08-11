<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentResponse;

enum Status: string
{
    case CREATED = 'CREATED';

    case SUBMITTED = 'SUBMITTED';

    case VERIFYING = 'VERIFYING';

    case VERIFIED = 'VERIFIED';

    case LAUNCHING = 'LAUNCHING';

    case LAUNCHED = 'LAUNCHED';

    case LIVE = 'LIVE';

    case REJECTED = 'REJECTED';

    case FAILED = 'FAILED';
}
