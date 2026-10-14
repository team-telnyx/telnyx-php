<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails\Dlp;

enum Response: string
{
    case IGNORE = 'ignore';

    case FLAG = 'flag';

    case BLOCK = 'block';
}
