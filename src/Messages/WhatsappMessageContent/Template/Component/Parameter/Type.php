<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter;

enum Type: string
{
    case TEXT = 'text';

    case IMAGE = 'image';

    case VIDEO = 'video';

    case DOCUMENT = 'document';

    case CURRENCY = 'currency';

    case DATE_TIME = 'date_time';
}
