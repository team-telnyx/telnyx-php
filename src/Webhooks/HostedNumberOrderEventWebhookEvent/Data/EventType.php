<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data;

/**
 * The type of event being delivered. Internal transfer events are only emitted for orders where the numbers are already active on another Telnyx account.
 */
enum EventType: string
{
    case MESSAGING_HOSTED_NUMBERS_ORDERS_CREATED = 'messaging_hosted_numbers_orders.created';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_UPDATED = 'messaging_hosted_numbers_orders.updated';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_DELETED = 'messaging_hosted_numbers_orders.deleted';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_INTERNAL_TRANSFER_DETECTED = 'messaging_hosted_numbers_orders.internal_transfer_detected';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_INTERNAL_TRANSFER_APPROVAL_REQUESTED = 'messaging_hosted_numbers_orders.internal_transfer_approval_requested';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_INTERNAL_TRANSFER_APPROVED = 'messaging_hosted_numbers_orders.internal_transfer_approved';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_INTERNAL_TRANSFER_REJECTED = 'messaging_hosted_numbers_orders.internal_transfer_rejected';

    case MESSAGING_HOSTED_NUMBERS_ORDERS_INTERNAL_TRANSFER_AUTO_APPROVED = 'messaging_hosted_numbers_orders.internal_transfer_auto_approved';
}
