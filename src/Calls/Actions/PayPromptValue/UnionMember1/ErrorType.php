<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\PayPromptValue\UnionMember1;

/**
 * Step error for which this prompt applies.
 */
enum ErrorType: string
{
    case TIMEOUT = 'timeout';

    case INVALID_CARD_NUMBER = 'invalid-card-number';

    case INVALID_DATE = 'invalid-date';

    case INVALID_SECURITY_CODE = 'invalid-security-code';

    case INVALID_POSTAL_CODE = 'invalid-postal-code';

    case INVALID_BANK_ROUTING_NUMBER = 'invalid-bank-routing-number';

    case INVALID_BANK_ACCOUNT_NUMBER = 'invalid-bank-account-number';

    case INPUT_MATCHING_FAILED = 'input-matching-failed';
}
