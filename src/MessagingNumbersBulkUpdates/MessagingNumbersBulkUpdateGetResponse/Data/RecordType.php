<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse\Data;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGING_NUMBERS_BULK_UPDATE = 'messaging_numbers_bulk_update';
}
