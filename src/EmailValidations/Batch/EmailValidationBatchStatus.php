<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch;

enum EmailValidationBatchStatus: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
