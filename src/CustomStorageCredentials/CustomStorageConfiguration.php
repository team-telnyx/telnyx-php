<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Configuration;

/**
 * @phpstan-import-type ConfigurationVariants from \Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Configuration
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Configuration
 *
 * @phpstan-type CustomStorageConfigurationShape = array{
 *   backend: Backend|value-of<Backend>, configuration: ConfigurationShape
 * }
 */
final class CustomStorageConfiguration implements BaseModel
{
    /** @use SdkModel<CustomStorageConfigurationShape> */
    use SdkModel;

    /** @var value-of<Backend> $backend */
    #[Required(enum: Backend::class)]
    public string $backend;

    /** @var ConfigurationVariants $configuration */
    #[Required(union: Configuration::class)]
    public GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration;

    /**
     * `new CustomStorageConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomStorageConfiguration::with(backend: ..., configuration: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomStorageConfiguration)->withBackend(...)->withConfiguration(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Backend|value-of<Backend> $backend
     * @param ConfigurationShape $configuration
     */
    public static function with(
        Backend|string $backend,
        GcsConfigurationData|array|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $self = new self;

        $self['backend'] = $backend;
        $self['configuration'] = $configuration;

        return $self;
    }

    /**
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $self = clone $this;
        $self['backend'] = $backend;

        return $self;
    }

    /**
     * @param ConfigurationShape $configuration
     */
    public function withConfiguration(
        GcsConfigurationData|array|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }
}
