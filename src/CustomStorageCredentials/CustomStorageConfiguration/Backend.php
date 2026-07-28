<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\CustomStorageConfiguration;

enum Backend: string
{
    case GCS = 'gcs';

    case S3 = 's3';

    case S3_GENERIC = 's3-generic';

    case AZURE = 'azure';
}
