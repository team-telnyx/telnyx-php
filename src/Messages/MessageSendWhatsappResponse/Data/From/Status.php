<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
