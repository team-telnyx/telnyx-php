<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingResponseData;

/**
 * The kind of event that led to this recording being created.
 */
enum Source: string
{
    case CONFERENCE = 'conference';

    case CALL = 'call';
}
