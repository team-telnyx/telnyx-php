<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive;

enum Type: string
{
    case CTA_URL = 'cta_url';

    case LIST = 'list';

    case CAROUSEL = 'carousel';

    case BUTTON = 'button';

    case LOCATION_REQUEST_MESSAGE = 'location_request_message';
}
