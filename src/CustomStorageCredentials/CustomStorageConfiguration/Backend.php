<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\CustomStorageConfiguration;

enum Backend: string
{
    case GCS = 'gcs';

    case S3 = 's3';

    case AZURE = 'azure';
}
