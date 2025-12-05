<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\S3ConfigurationData;

/**
 * Storage backend type.
 */
enum Backend: string
{
    case S3 = 's3';
}
