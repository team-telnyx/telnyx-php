<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data;

enum AssociatedRecordType: string
{
    case ACCOUNT = 'account';

    case PHONE_NUMBER = 'phone_number';
}
