<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload;

/**
 * The reason the call was ended (`call_rejected`, `normal_clearing`, `originator_cancel`, `timeout`, `time_limit`, `user_busy`, `not_found` or `unspecified`).
 */
enum HangupCause: string
{
    case CALL_REJECTED = 'call_rejected';

    case NORMAL_CLEARING = 'normal_clearing';

    case ORIGINATOR_CANCEL = 'originator_cancel';

    case TIMEOUT = 'timeout';

    case TIME_LIMIT = 'time_limit';

    case USER_BUSY = 'user_busy';

    case NOT_FOUND = 'not_found';

    case UNSPECIFIED = 'unspecified';
}
