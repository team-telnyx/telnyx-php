<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentInteraction;

enum InteractionType: string
{
    case TRANSACTIONAL_UPDATES = 'TRANSACTIONAL_UPDATES';

    case CUSTOMER_SUPPORT = 'CUSTOMER_SUPPORT';

    case LOYALTY_OR_REWARD = 'LOYALTY_OR_REWARD';

    case MARKETING_OR_PROMOTIONAL = 'MARKETING_OR_PROMOTIONAL';

    case ACCOUNT_ALERTS = 'ACCOUNT_ALERTS';

    case TWO_WAY_CONVERSATION = 'TWO_WAY_CONVERSATION';

    case OTHER = 'OTHER';
}
