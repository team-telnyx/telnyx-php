<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\CustomStorageConfiguration;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;

/**
 * @phpstan-import-type GcsConfigurationDataShape from \Telnyx\CustomStorageCredentials\GcsConfigurationData
 * @phpstan-import-type S3ConfigurationDataShape from \Telnyx\CustomStorageCredentials\S3ConfigurationData
 * @phpstan-import-type AzureConfigurationDataShape from \Telnyx\CustomStorageCredentials\AzureConfigurationData
 *
 * @phpstan-type ConfigurationShape = GcsConfigurationDataShape|S3ConfigurationDataShape|AzureConfigurationDataShape
 */
final class Configuration implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'backend';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'gcs' => GcsConfigurationData::class,
            's3' => S3ConfigurationData::class,
            'azure' => AzureConfigurationData::class,
        ];
    }
}
