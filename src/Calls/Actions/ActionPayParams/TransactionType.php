<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionPayParams;

/**
 * Transaction to perform. If omitted, Pay infers `tokenize` when `amount` is absent or zero and `charge` when `amount` is positive.
 */
enum TransactionType: string
{
    case CHARGE = 'charge';

    case TOKENIZE = 'tokenize';
}
