<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data;

/**
 * Review state of this authorization. `pending` on create or when the Letter of Authorization is re-uploaded; an admin moves it to `approved` or `rejected`. Only an `approved` authorization adds the BPO to this DIR's authorized callers in the branded calling registry.
 */
enum Status: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
