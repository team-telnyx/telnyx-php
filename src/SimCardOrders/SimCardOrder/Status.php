<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrder;

/**
 * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case READY_TO_SHIP = 'ready_to_ship';

    case SHIPPED = 'shipped';

    case DELIVERED = 'delivered';

    case CANCELED = 'canceled';
}
