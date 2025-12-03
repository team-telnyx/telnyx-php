<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumDetectionEndedWebhookEvent\Data1\Payload;

/**
 * Premium Answering Machine Detection result.
 */
enum Result: string
{
    case HUMAN_RESIDENCE = 'human_residence';

    case HUMAN_BUSINESS = 'human_business';

    case MACHINE = 'machine';

    case SILENCE = 'silence';

    case FAX_DETECTED = 'fax_detected';

    case NOT_SURE = 'not_sure';
}
