<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage;

enum Type: string
{
    case AUDIO = 'audio';

    case DOCUMENT = 'document';

    case IMAGE = 'image';

    case STICKER = 'sticker';

    case VIDEO = 'video';

    case INTERACTIVE = 'interactive';

    case LOCATION = 'location';

    case TEMPLATE = 'template';

    case REACTION = 'reaction';

    case CONTACTS = 'contacts';
}
