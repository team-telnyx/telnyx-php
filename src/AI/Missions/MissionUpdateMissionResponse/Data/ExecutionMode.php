<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\MissionUpdateMissionResponse\Data;

enum ExecutionMode: string
{
    case EXTERNAL = 'external';

    case MANAGED = 'managed';
}
