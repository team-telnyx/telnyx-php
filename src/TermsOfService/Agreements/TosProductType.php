<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

/**
 * Telnyx product the Terms of Service apply to.
 */
enum TosProductType: string
{
    case BRANDED_CALLING = 'branded_calling';

    case NUMBER_REPUTATION = 'number_reputation';
}
