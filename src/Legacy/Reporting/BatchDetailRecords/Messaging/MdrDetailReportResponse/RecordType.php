<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse;

enum RecordType: string
{
    case INCOMPLETE = 'INCOMPLETE';

    case COMPLETED = 'COMPLETED';

    case ERRORS = 'ERRORS';
}
