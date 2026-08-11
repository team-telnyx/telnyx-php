<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

/**
 * The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
 */
enum SourceType: string
{
    case VOICE = 'voice';

    case MEETING_BOT = 'meeting_bot';

    case MESSAGE = 'message';

    case BUCKET = 'bucket';
}
