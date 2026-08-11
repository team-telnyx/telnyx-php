<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

enum AgentUseCase: string
{
    case MULTI_USE = 'MULTI_USE';

    case PROMOTIONAL = 'PROMOTIONAL';

    case TRANSACTIONAL = 'TRANSACTIONAL';

    case OTP = 'OTP';
}
