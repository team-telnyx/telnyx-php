<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionBulkDisableVoiceResponse\Data;

/**
 * The action type. It can be one of the following: <br/>
 * <ul>
 * <li><code>bulk_disable_voice</code> - disable voice for every SIM Card in a SIM Card Group.</li>
 * <li><code>bulk_enable_voice</code> - enable voice for every SIM Card in a SIM Card Group.</li>
 * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM Card.</li>
 * </ul>.
 */
enum ActionType: string
{
    case BULK_DISABLE_VOICE = 'bulk_disable_voice';

    case BULK_ENABLE_VOICE = 'bulk_enable_voice';

    case BULK_SET_PUBLIC_IPS = 'bulk_set_public_ips';
}
