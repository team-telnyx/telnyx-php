<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\SimCardAction;

/**
 * The operation type. It can be one of the following: <br/>
 * <ul>
 *  <li><code>enable</code> - move the SIM card to the <code>enabled</code> status</li>
 *  <li><code>enable_standby_sim_card</code> - move a SIM card previously on the <code>standby</code> status to the <code>enabled</code> status after it consumes data.</li>
 *  <li><code>disable</code> - move the SIM card to the <code>disabled</code> status</li>
 *  <li><code>set_standby</code> - move the SIM card to the <code>standby</code> status</li>
 *  </ul>.
 */
enum ActionType: string
{
    case ENABLE = 'enable';

    case ENABLE_STANDBY_SIM_CARD = 'enable_standby_sim_card';

    case DISABLE = 'disable';

    case SET_STANDBY = 'set_standby';
}
