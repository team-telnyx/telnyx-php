<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\GuardrailFinding;

enum Action: string
{
    case FLAG = 'flag';

    case BLOCK = 'block';
}
