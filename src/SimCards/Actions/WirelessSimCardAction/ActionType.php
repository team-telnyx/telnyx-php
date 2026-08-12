<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\WirelessSimCardAction;

/**
 * The operation type. It can be one of the following: <br/>
 * <ul>
 *  <li><code>enable</code> - move the SIM card to the <code>enabled</code> status</li>
 *  <li><code>enable_standby_sim_card</code> - move a SIM card previously on the <code>standby</code> status to the <code>enabled</code> status after it consumes data.</li>
 *  <li><code>disable</code> - move the SIM card to the <code>disabled</code> status</li>
 *  <li><code>set_standby</code> - move the SIM card to the <code>standby</code> status</li>
 *  <li><code>enable_voice</code> - enable voice calling on the SIM card</li>
 *  <li><code>disable_voice</code> - disable voice calling on the SIM card</li>
 *  </ul>.
 */
enum ActionType: string
{
    case ENABLE = 'enable';

    case ENABLE_STANDBY_SIM_CARD = 'enable_standby_sim_card';

    case DISABLE = 'disable';

    case SET_STANDBY = 'set_standby';

    case ENABLE_VOICE = 'enable_voice';

    case DISABLE_VOICE = 'disable_voice';
}
