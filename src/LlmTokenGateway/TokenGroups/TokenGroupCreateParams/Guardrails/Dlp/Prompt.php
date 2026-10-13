<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp;

enum Prompt: string
{
    case IGNORE = 'ignore';

    case FLAG = 'flag';

    case BLOCK = 'block';
}
