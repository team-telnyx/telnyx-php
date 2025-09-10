<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;

/**
 * Which format to use when generating the CSV file. The default for backwards compatibility is 'V1'.
 */
enum CsvFormat: string
{
    case V1 = 'V1';

    case V2 = 'V2';
}
