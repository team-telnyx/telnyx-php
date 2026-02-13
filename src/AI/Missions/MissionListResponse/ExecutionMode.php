<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\MissionListResponse;

enum ExecutionMode: string
{
    case EXTERNAL = 'external';

    case MANAGED = 'managed';
}
