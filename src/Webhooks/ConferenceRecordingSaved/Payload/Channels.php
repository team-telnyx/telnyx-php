<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSaved\Payload;

/**
 * Whether recording was recorded in `single` or `dual` channel.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
