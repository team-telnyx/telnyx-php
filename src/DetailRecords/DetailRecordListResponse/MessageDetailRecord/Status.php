<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord;

/**
 * Final status of the message after the delivery attempt.
 */
enum Status: string
{
    case GW_TIMEOUT = 'gw_timeout';

    case DELIVERED = 'delivered';

    case DLR_UNCONFIRMED = 'dlr_unconfirmed';

    case DLR_TIMEOUT = 'dlr_timeout';

    case RECEIVED = 'received';

    case GW_REJECT = 'gw_reject';

    case FAILED = 'failed';
}
