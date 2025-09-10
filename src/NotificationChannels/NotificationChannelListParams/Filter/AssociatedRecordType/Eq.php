<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels\NotificationChannelListParams\Filter\AssociatedRecordType;

/**
 * Filter by the associated record type.
 */
enum Eq: string
{
    case ACCOUNT = 'account';

    case PHONE_NUMBER = 'phone_number';
}
