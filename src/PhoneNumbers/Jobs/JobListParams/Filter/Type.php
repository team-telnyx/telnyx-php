<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;

/**
 * Identifies the type of the background job.
 */
enum Type: string
{
    case UPDATE_EMERGENCY_SETTINGS = 'update_emergency_settings';

    case DELETE_PHONE_NUMBERS = 'delete_phone_numbers';

    case UPDATE_PHONE_NUMBERS = 'update_phone_numbers';
}
