<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappInteractive\Action\Card\Header;

enum Type: string
{
    case IMAGE = 'image';

    case VIDEO = 'video';
}
