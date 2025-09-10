<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings\NotificationSettingListParams\Filter\Status;

/**
 * The status of a notification setting.
 */
enum Eq: string
{
    case ENABLED = 'enabled';

    case ENABLE_RECEIVED = 'enable-received';

    case ENABLE_PENDING = 'enable-pending';

    case ENABLE_SUBMTITED = 'enable-submtited';

    case DELETE_RECEIVED = 'delete-received';

    case DELETE_PENDING = 'delete-pending';

    case DELETE_SUBMITTED = 'delete-submitted';

    case DELETED = 'deleted';
}
