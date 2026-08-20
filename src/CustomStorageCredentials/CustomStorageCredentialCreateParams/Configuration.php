<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;
use Telnyx\CustomStorageCredentials\S3GenericConfigurationData;

/**
 * @phpstan-import-type GcsConfigurationDataShape from \Telnyx\CustomStorageCredentials\GcsConfigurationData
 * @phpstan-import-type S3ConfigurationDataShape from \Telnyx\CustomStorageCredentials\S3ConfigurationData
 * @phpstan-import-type S3GenericConfigurationDataShape from \Telnyx\CustomStorageCredentials\S3GenericConfigurationData
 * @phpstan-import-type AzureConfigurationDataShape from \Telnyx\CustomStorageCredentials\AzureConfigurationData
 *
 * @phpstan-type ConfigurationVariants = GcsConfigurationData|S3ConfigurationData|S3GenericConfigurationData|AzureConfigurationData
 * @phpstan-type ConfigurationShape = ConfigurationVariants|GcsConfigurationDataShape|S3ConfigurationDataShape|S3GenericConfigurationDataShape|AzureConfigurationDataShape
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
            's3-generic' => S3GenericConfigurationData::class,
            'azure' => AzureConfigurationData::class,
        ];
    }
}
