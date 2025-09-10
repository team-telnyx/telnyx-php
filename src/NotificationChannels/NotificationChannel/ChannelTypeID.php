<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels\NotificationChannel;

/**
 * A Channel Type ID.
 */
enum ChannelTypeID: string
{
    case SMS = 'sms';

    case VOICE = 'voice';

    case EMAIL = 'email';

    case WEBHOOK = 'webhook';
}
