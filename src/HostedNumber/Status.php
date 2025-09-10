<?php

declare(strict_types=1);

namespace Telnyx\HostedNumber;

enum Status: string
{
    case DELETED = 'deleted';

    case FAILED = 'failed';

    case FAILED_ACTIVATION = 'failed_activation';

    case FAILED_CARRIER_REJECTED = 'failed_carrier_rejected';

    case FAILED_INELIGIBLE_CARRIER = 'failed_ineligible_carrier';

    case FAILED_NUMBER_ALREADY_HOSTED = 'failed_number_already_hosted';

    case FAILED_NUMBER_NOT_FOUND = 'failed_number_not_found';

    case FAILED_OWNERSHIP_VERIFICATION = 'failed_ownership_verification';

    case FAILED_TIMEOUT = 'failed_timeout';

    case PENDING = 'pending';

    case PROVISIONING = 'provisioning';

    case SUCCESSFUL = 'successful';
}
