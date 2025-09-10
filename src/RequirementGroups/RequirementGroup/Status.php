<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroup;

enum Status: string
{
    case APPROVED = 'approved';

    case UNAPPROVED = 'unapproved';

    case PENDING_APPROVAL = 'pending-approval';

    case DECLINED = 'declined';
}
