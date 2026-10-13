<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails;

enum Streaming: string
{
    case BUFFERED = 'buffered';

    case PASSTHROUGH = 'passthrough';
}
