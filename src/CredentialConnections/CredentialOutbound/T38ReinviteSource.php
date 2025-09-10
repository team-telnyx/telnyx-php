<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialOutbound;

/**
 * This setting only affects connections with Fax-type Outbound Voice Profiles. The setting dictates whether or not Telnyx sends a t.38 reinvite.<br/><br/> By default, Telnyx will send the re-invite. If set to `customer`, the caller is expected to send the t.38 reinvite.
 */
enum T38ReinviteSource: string
{
    case TELNYX = 'telnyx';

    case CUSTOMER = 'customer';

    case DISABLED = 'disabled';

    case PASSTHRU = 'passthru';

    case CALLER_PASSTHRU = 'caller-passthru';

    case CALLEE_PASSTHRU = 'callee-passthru';
}
