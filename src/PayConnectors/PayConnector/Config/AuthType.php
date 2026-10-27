<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnector\Config;

/**
 * Stored processor authentication selection. Omitted if it was not explicitly configured.
 */
enum AuthType: string
{
    case NONE = 'none';

    case BASIC = 'basic';

    case BEARER = 'bearer';
}
