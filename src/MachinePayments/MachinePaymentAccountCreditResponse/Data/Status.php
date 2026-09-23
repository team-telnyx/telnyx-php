<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * Status of the transaction. Successful machine payment credits are recorded as `settled`.
 */
enum Status: string
{
    case NEW = 'new';

    case PROCESSING = 'processing';

    case SETTLED = 'settled';

    case EXPIRED = 'expired';

    case INVALID = 'invalid';
}
