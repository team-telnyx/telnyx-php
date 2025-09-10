<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplication;

/**
 * HTTP request method Telnyx should use when requesting the status_callback URL.
 */
enum StatusCallbackMethod: string
{
    case GET = 'get';

    case POST = 'post';
}
