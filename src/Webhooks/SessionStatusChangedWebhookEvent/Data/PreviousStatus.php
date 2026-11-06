<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\SessionStatusChangedWebhookEvent\Data;

/**
 * Previous lifecycle status, when supplied.
 */
enum PreviousStatus: string
{
    case SCHEDULED = 'scheduled';

    case JOINING = 'joining';

    case WAITING_FOR_ADMISSION = 'waiting_for_admission';

    case ACTIVE = 'active';

    case LEAVING = 'leaving';

    case ENDED = 'ended';

    case FAILED = 'failed';

    case ADMISSION_DENIED = 'admission_denied';
}
