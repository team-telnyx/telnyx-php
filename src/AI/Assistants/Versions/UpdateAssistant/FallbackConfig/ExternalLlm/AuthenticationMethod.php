<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\FallbackConfig\ExternalLlm;

/**
 * Authentication method used when connecting to the external LLM endpoint.
 */
enum AuthenticationMethod: string
{
    case TOKEN = 'token';

    case CERTIFICATE = 'certificate';
}
