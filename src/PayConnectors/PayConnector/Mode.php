<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnector;

/**
 * Configured mode.
 */
enum Mode: string
{
    case TEST = 'test';

    case LIVE = 'live';
}
