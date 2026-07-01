<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

enum ExecutionMode: string
{
    case EXTERNAL = 'external';

    case MANAGED = 'managed';
}
