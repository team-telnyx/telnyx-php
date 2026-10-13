<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\GuardrailFinding;

enum Detector: string
{
    case SECRETS = 'secrets';

    case DLP = 'dlp';

    case SAFETY = 'safety';
}
