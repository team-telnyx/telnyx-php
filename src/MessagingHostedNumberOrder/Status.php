<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrder;

enum Status: string
{
    case CARRIER_REJECTED = 'carrier_rejected';

    case COMPLIANCE_REVIEW_FAILED = 'compliance_review_failed';

    case DELETED = 'deleted';

    case FAILED = 'failed';

    case INCOMPLETE_DOCUMENTATION = 'incomplete_documentation';

    case INCORRECT_BILLING_INFORMATION = 'incorrect_billing_information';

    case INELIGIBLE_CARRIER = 'ineligible_carrier';

    case LOA_FILE_INVALID = 'loa_file_invalid';

    case LOA_FILE_SUCCESSFUL = 'loa_file_successful';

    case PENDING = 'pending';

    case PROVISIONING = 'provisioning';

    case SUCCESSFUL = 'successful';
}
