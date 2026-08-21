<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\PayPromptValue\PayPromptList;

/**
 * Lowercase, case-sensitive detected card type for which this prompt applies.
 */
enum CardType: string
{
    case VISA = 'visa';

    case MASTERCARD = 'mastercard';

    case AMEX = 'amex';

    case OPTIMA = 'optima';

    case DISCOVER = 'discover';

    case DINERS_CLUB = 'diners-club';

    case JCB = 'jcb';

    case MAESTRO = 'maestro';

    case ENROUTE = 'enroute';
}
