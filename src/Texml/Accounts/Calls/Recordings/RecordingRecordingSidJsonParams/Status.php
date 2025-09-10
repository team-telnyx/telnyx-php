<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;

enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case PAUSED = 'paused';

    case STOPPED = 'stopped';
}
