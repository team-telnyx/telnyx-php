<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action\Button;

enum Type: string
{
    case REPLY = 'reply';
}
