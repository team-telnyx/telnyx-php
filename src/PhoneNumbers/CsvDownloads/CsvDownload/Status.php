<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownload;

/**
 * Indicates the completion level of the CSV report. Only complete CSV download requests will be able to be retrieved.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETE = 'complete';

    case FAILED = 'failed';

    case EXPIRED = 'expired';
}
