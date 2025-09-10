<?php

declare(strict_types=1);

namespace Telnyx\SimCardStatus;

/**
 * The current status of the SIM card. It will be one of the following: <br/>
 * <ul>
 *  <li><code>registering</code> - the card is being registered</li>
 *  <li><code>enabling</code> - the card is being enabled</li>
 *  <li><code>enabled</code> - the card is enabled and ready for use</li>
 *  <li><code>disabling</code> - the card is being disabled</li>
 *  <li><code>disabled</code> - the card has been disabled and cannot be used</li>
 *  <li><code>data_limit_exceeded</code> - the card has exceeded its data consumption limit</li>
 *  <li><code>setting_standby</code> - the process to set the card in stand by is in progress</li>
 *  <li><code>standby</code> - the card is in stand by</li>
 * </ul>
 * Transitioning between the enabled and disabled states may take a period of time.
 */
enum Value: string
{
    case REGISTERING = 'registering';

    case ENABLING = 'enabling';

    case ENABLED = 'enabled';

    case DISABLING = 'disabling';

    case DISABLED = 'disabled';

    case DATA_LIMIT_EXCEEDED = 'data_limit_exceeded';

    case SETTING_STANDBY = 'setting_standby';

    case STANDBY = 'standby';
}
