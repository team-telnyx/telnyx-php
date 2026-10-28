<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnectorUpdateParams;

/**
 * Omit to preserve the existing mode. Use an explicit test or live value.
 */
enum Mode: string
{
    case TEST = 'test';

    case LIVE = 'live';
}
