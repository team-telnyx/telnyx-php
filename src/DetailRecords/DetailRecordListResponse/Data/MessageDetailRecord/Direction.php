<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord;

/**
 * Logical direction of the message from the Telnyx customer's perspective. It's inbound when the Telnyx customer receives the message, or outbound otherwise.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
