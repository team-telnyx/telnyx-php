<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionPayParams;

/**
 * Currency used for the transaction. Pay currently supports USD only.
 */
enum Currency: string
{
    case USD = 'USD';

    case USD1 = 'usd';
}
