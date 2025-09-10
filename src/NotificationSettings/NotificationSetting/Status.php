<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings\NotificationSetting;

/**
 * Most preferences apply immediately; however, other may needs to propagate.
 */
enum Status: string
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
