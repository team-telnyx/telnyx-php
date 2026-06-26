<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\NumberReputation\NumberReputationAgreeResponse\Data;

/**
 * Telnyx product the Terms of Service apply to.
 */
enum ProductType: string
{
    case BRANDED_CALLING = 'branded_calling';

    case NUMBER_REPUTATION = 'number_reputation';
}
