<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

/**
 * Same value as `provisioning.dns_status`.
 */
enum ProvisioningStatus: string
{
    case NOT_APPLICABLE = 'not_applicable';

    case PENDING_PTR = 'pending_ptr';

    case PENDING_DNS = 'pending_dns';

    case DNS_CONFIRMED = 'dns_confirmed';

    case DNS_LOST = 'dns_lost';
}
