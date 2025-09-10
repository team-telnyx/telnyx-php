<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams;

/**
 * The HTTP method to use when calling the `HoldUrl`.
 */
enum HoldMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
