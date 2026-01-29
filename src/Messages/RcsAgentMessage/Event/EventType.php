<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsAgentMessage\Event;

enum EventType: string
{
    case TYPE_UNSPECIFIED = 'TYPE_UNSPECIFIED';

    case IS_TYPING = 'IS_TYPING';

    case READ = 'READ';
}
