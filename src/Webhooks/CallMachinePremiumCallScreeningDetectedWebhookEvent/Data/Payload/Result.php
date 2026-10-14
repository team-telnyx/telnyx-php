<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumCallScreeningDetectedWebhookEvent\Data\Payload;

/**
 * Apple Call Screening detection result. Sent when an Apple Call Screening tone is detected; Premium Answering Machine Detection is restarted on the screened call afterwards.
 */
enum Result: string
{
    case SCREENING = 'screening';
}
