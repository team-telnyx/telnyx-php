<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card\Header;

enum Type: string
{
    case IMAGE = 'image';

    case VIDEO = 'video';
}
