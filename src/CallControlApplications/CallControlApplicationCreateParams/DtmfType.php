<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications\CallControlApplicationCreateParams;

/**
 * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
 */
enum DtmfType: string
{
    case RFC_2833 = 'RFC 2833';

    case INBAND = 'Inband';

    case SIP_INFO = 'SIP INFO';
}
