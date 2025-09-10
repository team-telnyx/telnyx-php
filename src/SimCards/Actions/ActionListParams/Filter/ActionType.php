<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionListParams\Filter;

/**
 * Filter by action type.
 */
enum ActionType: string
{
    case ENABLE = 'enable';

    case ENABLE_STANDBY_SIM_CARD = 'enable_standby_sim_card';

    case DISABLE = 'disable';

    case SET_STANDBY = 'set_standby';

    case REMOVE_PUBLIC_IP = 'remove_public_ip';

    case SET_PUBLIC_IP = 'set_public_ip';
}
