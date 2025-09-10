<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\Job;

/**
 * Identifies the type of the background job.
 */
enum Type: string
{
    case DELETE_PHONE_NUMBER_BLOCK = 'delete_phone_number_block';
}
