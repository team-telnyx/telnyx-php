<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappResponse\Data\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
