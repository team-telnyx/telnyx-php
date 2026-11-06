<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingExportFailedWebhookEvent\Data;

enum Reason: string
{
    case INVALID_TARGET = 'invalid_target';

    case INVALID_MEDIA = 'invalid_media';

    case SOURCE_CHANGED = 'source_changed';

    case SOURCE_UNAVAILABLE = 'source_unavailable';

    case TOO_LARGE = 'too_large';

    case STORAGE_UNAVAILABLE = 'storage_unavailable';

    case OBJECT_CONFLICT = 'object_conflict';

    case VERIFICATION_FAILED = 'verification_failed';

    case WORKER_LOST = 'worker_lost';

    case INTERNAL_ERROR = 'internal_error';
}
