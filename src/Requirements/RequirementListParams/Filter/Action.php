<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams\Filter;

/**
 * Filters requirements to those applying to a specific action.
 */
enum Action: string
{
    case BRANDED_CALLING = 'branded_calling';

    case ORDERING = 'ordering';

    case PORTING = 'porting';
}
