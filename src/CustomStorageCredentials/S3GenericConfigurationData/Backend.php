<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\S3GenericConfigurationData;

/**
 * Storage backend type.
 */
enum Backend: string
{
    case S3_GENERIC = 's3-generic';
}
