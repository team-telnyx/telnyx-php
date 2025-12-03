<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachineDetectionEndedWebhookEvent\Data1\Payload;

/**
 * Answering machine detection result.
 */
enum Result: string
{
    case HUMAN = 'human';

    case MACHINE = 'machine';

    case NOT_SURE = 'not_sure';
}
