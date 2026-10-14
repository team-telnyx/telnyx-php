<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails;

enum Streaming: string
{
    case BUFFERED = 'buffered';

    case PASSTHROUGH = 'passthrough';
}
