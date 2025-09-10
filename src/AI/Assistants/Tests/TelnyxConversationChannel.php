<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

enum TelnyxConversationChannel: string
{
    case PHONE_CALL = 'phone_call';

    case WEB_CALL = 'web_call';

    case SMS_CHAT = 'sms_chat';

    case WEB_CHAT = 'web_chat';
}
