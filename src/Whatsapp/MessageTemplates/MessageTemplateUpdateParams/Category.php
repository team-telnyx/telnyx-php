<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams;

enum Category: string
{
    case MARKETING = 'MARKETING';

    case UTILITY = 'UTILITY';

    case AUTHENTICATION = 'AUTHENTICATION';
}
