<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\PortingActionRequirement;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case PORTING_ACTION_REQUIREMENT = 'porting_action_requirement';
}
