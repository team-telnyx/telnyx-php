<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionShareResponse\Data;

enum Permission: string
{
    case PORTING_ORDER_DOCUMENT_READ = 'porting_order.document.read';

    case PORTING_ORDER_DOCUMENT_UPDATE = 'porting_order.document.update';
}
