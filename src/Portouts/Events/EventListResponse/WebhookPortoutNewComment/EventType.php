<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\WebhookPortoutNewComment;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTOUT_STATUS_CHANGED = 'portout.status_changed';

    case PORTOUT_FOC_DATE_CHANGED = 'portout.foc_date_changed';

    case PORTOUT_NEW_COMMENT = 'portout.new_comment';
}
