<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateResponse\Data;

enum Category: string
{
    case MARKETING = 'MARKETING';

    case UTILITY = 'UTILITY';

    case AUTHENTICATION = 'AUTHENTICATION';
}
