<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters;

enum StatusIn: string
{
    case PENDING = 'pending';

    case AUTHORIZED = 'authorized';

    case PORTED = 'ported';

    case REJECTED = 'rejected';

    case REJECTED_PENDING = 'rejected-pending';

    case CANCELED = 'canceled';
}
