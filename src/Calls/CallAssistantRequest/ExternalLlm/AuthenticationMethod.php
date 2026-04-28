<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallAssistantRequest\ExternalLlm;

/**
 * Authentication method used when connecting to the external LLM endpoint.
 */
enum AuthenticationMethod: string
{
    case TOKEN = 'token';

    case CERTIFICATE = 'certificate';
}
