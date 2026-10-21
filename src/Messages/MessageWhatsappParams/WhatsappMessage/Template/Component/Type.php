<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component;

enum Type: string
{
    case HEADER = 'header';

    case BODY = 'body';

    case BUTTON = 'button';
}
