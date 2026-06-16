<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\TermsOfServiceInfoParams;

/**
 * Optional product filter. Omit to return info for all products.
 */
enum ProductType: string
{
    case BRANDED_CALLING = 'branded_calling';

    case NUMBER_REPUTATION = 'number_reputation';
}
