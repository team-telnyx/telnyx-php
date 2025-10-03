<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CustomStorageCredentialCreateParams); // set properties as needed
 * $client->customStorageCredentials->create(...$params->toArray());
 * ```
 * Creates a custom storage credentials configuration.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->customStorageCredentials->create(...$params->toArray());`
 *
 * @see Telnyx\CustomStorageCredentials->create
 *
 * @phpstan-type custom_storage_credential_create_params = array{
 *   backend: Backend|value-of<Backend>,
 *   configuration: GcsConfigurationData|S3ConfigurationData|AzureConfigurationData,
 * }
 */
final class CustomStorageCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<custom_storage_credential_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Backend> $backend */
    #[Api(enum: Backend::class)]
    public string $backend;

    #[Api]
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
     */
    public static function with(
        Backend|string $backend,
        GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $obj = new self;

        $obj['backend'] = $backend;
        $obj->configuration = $configuration;

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

    public function withConfiguration(
        GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration,
    ): self {
        $obj = clone $this;
        $obj->configuration = $configuration;

        return $obj;
    }
}
