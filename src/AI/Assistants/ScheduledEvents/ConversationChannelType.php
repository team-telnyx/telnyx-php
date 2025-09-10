<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

enum ConversationChannelType: string
{
    case PHONE_CALL = 'phone_call';

    case SMS_CHAT = 'sms_chat';
}
