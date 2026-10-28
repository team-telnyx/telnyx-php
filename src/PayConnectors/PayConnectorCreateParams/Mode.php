<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnectorCreateParams;

/**
 * Defaults to test on creation. Test restricts collected card numbers but still contacts the configured processor; use a processor sandbox URL and sandbox credentials. Live removes the test-card restriction. Neither mode locks API updates.
 */
enum Mode: string
{
    case TEST = 'test';

    case LIVE = 'live';
}
