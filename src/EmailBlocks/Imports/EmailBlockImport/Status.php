<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\Imports\EmailBlockImport;

enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
