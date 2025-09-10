<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\InboundFqdn;

enum DnisNumberFormat : string
{

    case DNIS_NUMBER_FORMAT_+E164 = "+e164";

    case E164 = "e164";

    case NATIONAL = "national";

    case SIP_USERNAME = "sip_username";

}