<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status;

enum In: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
