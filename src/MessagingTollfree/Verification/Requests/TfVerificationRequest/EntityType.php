<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests\TfVerificationRequest;

/**
 * Business entity classification.
 */
enum EntityType: string
{
    case SOLE_PROPRIETOR = 'SOLE_PROPRIETOR';

    case PRIVATE_PROFIT = 'PRIVATE_PROFIT';

    case PUBLIC_PROFIT = 'PUBLIC_PROFIT';

    case NON_PROFIT = 'NON_PROFIT';

    case GOVERNMENT = 'GOVERNMENT';
}
