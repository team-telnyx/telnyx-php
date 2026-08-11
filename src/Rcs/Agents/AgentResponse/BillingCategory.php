<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentResponse;

enum BillingCategory: string
{
    case NON_CONVERSATIONAL = 'NON_CONVERSATIONAL';

    case CONVERSATIONAL = 'CONVERSATIONAL';
}
