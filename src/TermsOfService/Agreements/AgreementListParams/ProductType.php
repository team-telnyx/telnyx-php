<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements\AgreementListParams;

/**
 * Optional filter. Omit to list the user's agreements for **every** product (branded_calling and number_reputation); pass a value to return only that product's agreements.
 */
enum ProductType: string
{
    case BRANDED_CALLING = 'branded_calling';

    case NUMBER_REPUTATION = 'number_reputation';
}
