<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging;

/**
 * Indicates the messaging port status of the porting order.
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
