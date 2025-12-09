<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Configuration;

/**
 * @phpstan-type CustomStorageConfigurationShape = array{
 *   backend: value-of<Backend>,
 *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
 * }
 */
final class CustomStorageConfiguration implements BaseModel
{
    /** @use SdkModel<CustomStorageConfigurationShape> */
    use SdkModel;

    /** @var value-of<Backend> $backend */
    #[Required(enum: Backend::class)]
    public string $backend;

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
     * @param GcsConfigurationData|array{
     *   backend: value-of<GcsConfigurationData\Backend>,
     *   bucket?: string|null,
     *   credentials?: string|null,
     * }|S3ConfigurationData|array{
     *   backend: value-of<S3ConfigurationData\Backend>,
     *   awsAccessKeyID?: string|null,
     *   awsSecretAccessKey?: string|null,
     *   bucket?: string|null,
     *   region?: string|null,
     * }|AzureConfigurationData|array{
     *   backend: value-of<AzureConfigurationData\Backend>,
     *   accountKey?: string|null,
     *   accountName?: string|null,
     *   bucket?: string|null,
     * } $configuration
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
     * @param GcsConfigurationData|array{
     *   backend: value-of<GcsConfigurationData\Backend>,
     *   bucket?: string|null,
     *   credentials?: string|null,
     * }|S3ConfigurationData|array{
     *   backend: value-of<S3ConfigurationData\Backend>,
     *   awsAccessKeyID?: string|null,
     *   awsSecretAccessKey?: string|null,
     *   bucket?: string|null,
     *   region?: string|null,
     * }|AzureConfigurationData|array{
     *   backend: value-of<AzureConfigurationData\Backend>,
     *   accountKey?: string|null,
     *   accountName?: string|null,
     *   bucket?: string|null,
     * } $configuration
     */
    public function withConfiguration(
        GcsConfigurationData|array|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }
}
