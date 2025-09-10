<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;

/**
 * Filter action requirements by action type.
 */
enum ActionType: string
{
    case AU_ID_VERIFICATION = 'au_id_verification';
}
