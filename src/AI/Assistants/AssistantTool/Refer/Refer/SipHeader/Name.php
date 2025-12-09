<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\Refer\Refer\SipHeader;

enum Name: string
{
    case USER_TO_USER = 'User-to-User';

    case DIVERSION = 'Diversion';
}
