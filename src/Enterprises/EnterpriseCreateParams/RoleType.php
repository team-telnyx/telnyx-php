<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseCreateParams;

/**
 * `enterprise` for an organization registering its own DIRs (the default, and the right choice when the calls display your own brand). `bpo` for a Business Process Outsourcer: a call center that places calls on behalf of other enterprises and displays their brand. A `bpo` enterprise describes the call center itself and cannot own a DIR. Each client the call center calls for gets its own `enterprise` in the same account, with the client's DIR under it; that DIR is then linked to the `bpo` enterprise through `bpo_authorizations`. Fixed at creation.
 */
enum RoleType: string
{
    case ENTERPRISE = 'enterprise';

    case BPO = 'bpo';
}
