<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageConfiguration\Backend;

/**
 * @phpstan-type custom_storage_configuration = array{
 *   backend: value-of<Backend>,
 *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
 * }
 */
final class CustomStorageConfiguration implements BaseModel
{
    /** @use SdkModel<custom_storage_configuration> */
    use SdkModel;

    /** @var value-of<Backend> $backend */
    #[Api(enum: Backend::class)]
    public string $backend;

    #[Api]
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
     */
    public static function with(
        Backend|string $backend,
        GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $obj = new self;

        $obj->backend = $backend instanceof Backend ? $backend->value : $backend;
        $obj->configuration = $configuration;

        return $obj;
    }

    /**
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $obj = clone $this;
        $obj->backend = $backend instanceof Backend ? $backend->value : $backend;

        return $obj;
    }

    public function withConfiguration(
        GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $obj = clone $this;
        $obj->configuration = $configuration;

        return $obj;
    }
}
