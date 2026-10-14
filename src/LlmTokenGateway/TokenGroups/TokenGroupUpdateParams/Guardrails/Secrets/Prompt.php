<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails\Secrets;

enum Prompt: string
{
    case IGNORE = 'ignore';

    case FLAG = 'flag';

    case BLOCK = 'block';
}
