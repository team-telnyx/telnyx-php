<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups\BillingGroup;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case BILLING_GROUP = 'billing_group';
}
