<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template\Component;

enum SubType: string
{
    case QUICK_REPLY = 'quick_reply';

    case URL = 'url';
}
