<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse\Data;

enum Status: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';

    case FAILED = 'FAILED';

    case EXPIRED = 'EXPIRED';
}
