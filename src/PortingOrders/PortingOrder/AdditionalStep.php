<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrder;

enum AdditionalStep: string
{
    case ASSOCIATED_PHONE_NUMBERS = 'associated_phone_numbers';

    case PHONE_NUMBER_VERIFICATION_CODES = 'phone_number_verification_codes';
}
