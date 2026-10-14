<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\PayToolParams;

enum ValidCardType: string
{
    case VISA = 'visa';

    case MASTERCARD = 'mastercard';

    case AMEX = 'amex';

    case MAESTRO = 'maestro';

    case DISCOVER = 'discover';

    case OPTIMA = 'optima';

    case JCB = 'jcb';

    case DINERS_CLUB = 'diners-club';

    case ENROUTE = 'enroute';
}
