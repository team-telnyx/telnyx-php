<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetResponse\Data;

/**
 * Current lifecycle state for a coexistence number. This is null for a standard Cloud API number.
 */
enum CoexistenceState: string
{
    case PENDING_ONBOARDING = 'pending_onboarding';

    case SYNC_PENDING = 'sync_pending';

    case SYNCING = 'syncing';

    case SYNC_COMPLETE = 'sync_complete';

    case ACTIVE = 'active';

    case HISTORY_DECLINED = 'history_declined';

    case SYNC_DEADLINE_EXPIRED = 'sync_deadline_expired';

    case OFFBOARDED = 'offboarded';

    case DISCONNECTED = 'disconnected';
}
