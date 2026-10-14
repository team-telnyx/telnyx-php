<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails\Dlp;

enum Profile: string
{
    case FINANCIAL = 'financial';

    case GOVERNMENT_ID = 'government_id';

    case CONTACT = 'contact';
}
