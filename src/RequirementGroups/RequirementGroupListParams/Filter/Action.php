<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupListParams\Filter;

/**
 * Filter requirement groups by action type.
 */
enum Action: string
{
    case ORDERING = 'ordering';

    case PORTING = 'porting';

    case ACTION = 'action';
}
