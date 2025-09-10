<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
 */
enum MuteDtmf: string
{
    case NONE = 'none';

    case BOTH = 'both';

    case SELF = 'self';

    case OPPOSITE = 'opposite';
}
