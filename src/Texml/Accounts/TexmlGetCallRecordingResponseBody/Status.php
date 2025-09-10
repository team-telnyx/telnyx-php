<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';

    case PAUSED = 'paused';

    case STOPPED = 'stopped';
}
