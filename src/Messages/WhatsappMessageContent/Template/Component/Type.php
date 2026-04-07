<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template\Component;

enum Type: string
{
    case HEADER = 'header';

    case BODY = 'body';

    case BUTTON = 'button';
}
