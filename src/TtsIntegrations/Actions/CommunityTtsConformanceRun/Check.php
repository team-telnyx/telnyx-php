<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;

enum Check: string
{
    case OK = 'ok';

    case FAILED = 'failed';

    case SKIPPED = 'skipped';
}
