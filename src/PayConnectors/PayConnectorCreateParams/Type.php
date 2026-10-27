<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnectorCreateParams;

/**
 * Connector type covered by this reference.
 */
enum Type: string
{
    case GENERIC = 'generic';
}
