<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging\MessagingListParams;

/**
 * Sort by phone number.
 */
enum SortPhoneNumber: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
