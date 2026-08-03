<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch\BatchNewResponse\Data;

enum RecordType: string
{
    case EMAIL_VALIDATION_BATCH = 'email_validation_batch';
}
