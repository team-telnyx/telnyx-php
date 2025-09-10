<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;

/**
 * Action to check requirements for.
 */
enum Action: string
{
    case ORDERING = 'ordering';

    case PORTING = 'porting';

    case ACTION = 'action';
}
