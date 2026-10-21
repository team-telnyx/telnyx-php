<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component;

enum SubType: string
{
    case QUICK_REPLY = 'quick_reply';

    case URL = 'url';

    case FLOW = 'flow';
}
