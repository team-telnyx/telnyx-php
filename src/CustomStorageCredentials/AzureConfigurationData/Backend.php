<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\AzureConfigurationData;

/**
 * Storage backend type.
 */
enum Backend: string
{
    case AZURE = 'azure';
}
