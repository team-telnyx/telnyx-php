<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Header;

/**
 * header type. Required when a header is provided; the matching document, image, text, or video field must be set.
 */
enum Type: string
{
    case DOCUMENT = 'document';

    case IMAGE = 'image';

    case TEXT = 'text';

    case VIDEO = 'video';
}
