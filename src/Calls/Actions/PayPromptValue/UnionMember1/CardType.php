<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\PayPromptValue\UnionMember1;

/**
 * Lowercase, case-sensitive detected card type for which this prompt applies. Only the listed brands are currently detected; accepted UnionPay and Maestro test cards do not produce a card-type qualifier.
 */
enum CardType: string
{
    case VISA = 'visa';

    case MASTERCARD = 'mastercard';

    case AMEX = 'amex';

    case DISCOVER = 'discover';

    case DINERS_CLUB = 'diners-club';

    case JCB = 'jcb';
}
