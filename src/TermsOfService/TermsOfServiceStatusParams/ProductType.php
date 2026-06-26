<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\TermsOfServiceStatusParams;

/**
 * Which product's ToS to check. Defaults to `branded_calling`.
 */
enum ProductType: string
{
    case BRANDED_CALLING = 'branded_calling';

    case NUMBER_REPUTATION = 'number_reputation';
}
