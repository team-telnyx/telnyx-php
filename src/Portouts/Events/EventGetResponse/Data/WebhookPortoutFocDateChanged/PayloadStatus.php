<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutFocDateChanged;

/**
 * The status of the payload generation.
 */
enum PayloadStatus: string
{
    case CREATED = 'created';

    case COMPLETED = 'completed';
}
