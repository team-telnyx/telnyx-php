<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;

/**
 * The capabilities that are available for this phone number on Microsoft Teams.
 */
enum AcquiredCapability: string
{
    case FIRST_PARTY_APP_ASSIGNMENT = 'FirstPartyAppAssignment';

    case INBOUND_CALLING = 'InboundCalling';

    case OFFICE365 = 'Office365';

    case OUTBOUND_CALLING = 'OutboundCalling';

    case USER_ASSIGNMENT = 'UserAssignment';
}
