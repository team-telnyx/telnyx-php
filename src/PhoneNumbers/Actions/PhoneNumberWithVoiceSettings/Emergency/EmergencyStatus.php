<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;

/**
 * Represents the state of the number regarding emergency activation.
 */
enum EmergencyStatus: string
{
    case DISABLED = 'disabled';

    case ACTIVE = 'active';

    case PROVISIONING = 'provisioning';

    case DEPROVISIONING = 'deprovisioning';

    case PROVISIONING_FAILED = 'provisioning-failed';
}
