<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderMessaging;

/**
 * The current status of the messaging porting.
 */
enum MessagingPortStatus: string
{
    case NOT_APPLICABLE = 'not_applicable';

    case PENDING = 'pending';

    case ACTIVATING = 'activating';

    case EXCEPTION = 'exception';

    case CANCELED = 'canceled';

    case PARTIAL_PORT_COMPLETE = 'partial_port_complete';

    case PORTED = 'ported';
}
