<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionShareParams;

/**
 * The permissions the token will have.
 */
enum Permissions: string
{
    case PORTING_ORDER_DOCUMENT_READ = 'porting_order.document.read';

    case PORTING_ORDER_DOCUMENT_UPDATE = 'porting_order.document.update';
}
