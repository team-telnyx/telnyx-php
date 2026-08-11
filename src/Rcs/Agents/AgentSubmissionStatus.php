<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

enum AgentSubmissionStatus: string
{
    case SUBMITTED = 'SUBMITTED';

    case APPROVED = 'APPROVED';

    case REJECTED = 'REJECTED';
}
