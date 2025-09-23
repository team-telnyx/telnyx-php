<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse\Data;

enum RecordType: string
{
    case INCOMPLETE = 'INCOMPLETE';

    case COMPLETED = 'COMPLETED';

    case ERRORS = 'ERRORS';
}
