<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Configuration;

/**
 * Creates a custom storage credentials configuration.
 *
 * @see Telnyx\Services\CustomStorageCredentialsService::create()
 *
 * @phpstan-type CustomStorageCredentialCreateParamsShape = array{
 *   backend: Backend|value-of<Backend>,
 *   configuration: GcsConfigurationData|array{
 *     backend: value-of<\Telnyx\CustomStorageCredentials\GcsConfigurationData\Backend>,
 *     bucket?: string|null,
 *     credentials?: string|null,
 *   }|S3ConfigurationData|array{
 *     backend: value-of<\Telnyx\CustomStorageCredentials\S3ConfigurationData\Backend>,
 *     awsAccessKeyID?: string|null,
 *     awsSecretAccessKey?: string|null,
 *     bucket?: string|null,
 *     region?: string|null,
 *   }|AzureConfigurationData|array{
 *     backend: value-of<\Telnyx\CustomStorageCredentials\AzureConfigurationData\Backend>,
 *     accountKey?: string|null,
 *     accountName?: string|null,
 *     bucket?: string|null,
 *   },
 * }
 */
final class CustomStorageCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<CustomStorageCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Backend> $backend */
    #[Required(enum: Backend::class)]
    public string $backend;

    #[Required(union: Configuration::class)]
    public GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration;

    /**
     * `new CustomStorageCredentialCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomStorageCredentialCreateParams::with(backend: ..., configuration: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomStorageCredentialCreateParams)
     *   ->withBackend(...)
     *   ->withConfiguration(...)
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
        $obj = new self;

        $obj['backend'] = $backend;
        $obj['configuration'] = $configuration;

        return $obj;
    }

    /**
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $obj = clone $this;
        $obj['backend'] = $backend;

        return $obj;
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
        $obj = clone $this;
        $obj['configuration'] = $configuration;

        return $obj;
    }
}
