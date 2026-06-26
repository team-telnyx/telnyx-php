<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateHeaderComponent;

/**
 * Header format type: TEXT (supports one variable), IMAGE, VIDEO, DOCUMENT, or LOCATION.
 */
enum Format: string
{
    case TEXT = 'TEXT';

    case IMAGE = 'IMAGE';

    case VIDEO = 'VIDEO';

    case DOCUMENT = 'DOCUMENT';

    case LOCATION = 'LOCATION';
}
