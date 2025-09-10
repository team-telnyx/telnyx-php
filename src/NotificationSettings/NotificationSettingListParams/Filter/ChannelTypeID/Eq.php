<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings\NotificationSettingListParams\Filter\ChannelTypeID;

/**
 * Filter by the id of a channel type.
 */
enum Eq: string
{
    case WEBHOOK = 'webhook';

    case SMS = 'sms';

    case EMAIL = 'email';

    case VOICE = 'voice';
}
