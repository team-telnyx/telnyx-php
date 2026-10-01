<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data;

/**
 * Always `bpo_authorization`.
 */
enum RecordType: string
{
    case BPO_AUTHORIZATION = 'bpo_authorization';
}
