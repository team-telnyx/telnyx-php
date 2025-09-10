<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;

/**
 * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
 */
enum AnnounceMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
