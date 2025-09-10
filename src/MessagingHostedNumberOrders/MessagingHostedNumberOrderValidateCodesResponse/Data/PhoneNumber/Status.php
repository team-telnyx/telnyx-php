<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber;

enum Status: string
{
    case VERIFIED = 'verified';

    case REJECTED = 'rejected';

    case ALREADY_VERIFIED = 'already_verified';
}
