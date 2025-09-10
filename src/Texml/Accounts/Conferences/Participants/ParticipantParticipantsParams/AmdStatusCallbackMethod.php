<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * HTTP request type used for `AmdStatusCallback`. Defaults to `POST`.
 */
enum AmdStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
