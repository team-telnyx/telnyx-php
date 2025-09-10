<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDetailed;

/**
 * Indicates if the phone number was purchased or ported in. For some numbers this information may not be available.
 */
enum SourceType: string
{
    case NUMBER_ORDER = 'number_order';

    case PORT_REQUEST = 'port_request';
}
