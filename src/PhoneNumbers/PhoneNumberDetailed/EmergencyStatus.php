<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDetailed;

/**
 * Indicates the status of the provisioning of emergency services for the phone number. This field contains information about activity that may be ongoing for a number where it either is being provisioned or deprovisioned but is not yet enabled/disabled.
 */
enum EmergencyStatus: string
{
    case ACTIVE = 'active';

    case DEPROVISIONING = 'deprovisioning';

    case DISABLED = 'disabled';

    case PROVISIONING = 'provisioning';

    case PROVISIONING_FAILED = 'provisioning-failed';
}
