<?php

declare(strict_types=1);

namespace Telnyx\PortingOrderStatus\Detail\Remediation;

/**
 * The type of remediation action to take.
 */
enum Action: string
{
    case UPDATE_ORDER_FIELDS = 'update_order_fields';

    case UPLOAD_DOCUMENT = 'upload_document';

    case CREATE_ORDERS = 'create_orders';

    case ASSIGN_FOC_DATETIME = 'assign_foc_datetime';

    case WAIT = 'wait';

    case EXTERNAL_ACTION = 'external_action';

    case CONTACT_SUPPORT = 'contact_support';
}
