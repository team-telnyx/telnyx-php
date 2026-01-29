<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\GcsConfigurationData;

/**
 * Storage backend type.
 */
enum Backend: string
{
    case GCS = 'gcs';
}
