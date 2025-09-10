<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\SimCardGroupAction;

/**
 * Represents the type of the operation requested.
 */
enum Type: string
{
    case SET_PRIVATE_WIRELESS_GATEWAY = 'set_private_wireless_gateway';

    case REMOVE_PRIVATE_WIRELESS_GATEWAY = 'remove_private_wireless_gateway';

    case SET_WIRELESS_BLOCKLIST = 'set_wireless_blocklist';

    case REMOVE_WIRELESS_BLOCKLIST = 'remove_wireless_blocklist';
}
