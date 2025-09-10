<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationUpdateParams;

/**
 * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
 */
enum VoiceMethod: string
{
    case GET = 'get';

    case POST = 'post';
}
