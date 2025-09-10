<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

/**
 * Status of an embeddings task.
 */
enum BackgroundTaskStatus: string
{
    case QUEUED = 'queued';

    case PROCESSING = 'processing';

    case SUCCESS = 'success';

    case FAILURE = 'failure';

    case PARTIAL_SUCCESS = 'partial_success';
}
