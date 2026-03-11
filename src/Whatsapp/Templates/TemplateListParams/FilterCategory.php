<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateListParams;

/**
 * Filter by category.
 */
enum FilterCategory: string
{
    case MARKETING = 'MARKETING';

    case UTILITY = 'UTILITY';

    case AUTHENTICATION = 'AUTHENTICATION';
}
