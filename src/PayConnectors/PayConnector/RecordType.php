<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors\PayConnector;

/**
 * Resource type.
 */
enum RecordType: string
{
    case PAY_CONNECTOR = 'pay_connector';
}
