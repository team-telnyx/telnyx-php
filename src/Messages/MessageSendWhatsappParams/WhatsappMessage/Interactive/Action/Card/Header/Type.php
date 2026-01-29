<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header;

enum Type: string
{
    case IMAGE = 'image';

    case VIDEO = 'video';
}
