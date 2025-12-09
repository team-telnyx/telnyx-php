<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\AzureConfigurationData\Backend;

/**
 * @phpstan-type AzureConfigurationDataShape = array{
 *   backend: value-of<Backend>,
 *   accountKey?: string|null,
 *   accountName?: string|null,
 *   bucket?: string|null,
 * }
 */
final class AzureConfigurationData implements BaseModel
{
    /** @use SdkModel<AzureConfigurationDataShape> */
    use SdkModel;

    /**
     * Storage backend type.
     *
     * @var value-of<Backend> $backend
     */
    #[Required(enum: Backend::class)]
    public string $backend;

    /**
     * Azure Blob Storage account key.
     */
    #[Optional('account_key')]
    public ?string $accountKey;

    /**
     * Azure Blob Storage account name.
     */
    #[Optional('account_name')]
    public ?string $accountName;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Optional]
    public ?string $bucket;

    /**
     * `new AzureConfigurationData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AzureConfigurationData::with(backend: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AzureConfigurationData)->withBackend(...)
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
        ?string $accountKey = null,
        ?string $accountName = null,
        ?string $bucket = null,
    ): self {
        $self = new self;

        $self['backend'] = $backend;

        null !== $accountKey && $self['accountKey'] = $accountKey;
        null !== $accountName && $self['accountName'] = $accountName;
        null !== $bucket && $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $self = clone $this;
        $self['backend'] = $backend;

        return $self;
    }

    /**
     * Azure Blob Storage account key.
     */
    public function withAccountKey(string $accountKey): self
    {
        $self = clone $this;
        $self['accountKey'] = $accountKey;

        return $self;
    }

    /**
     * Azure Blob Storage account name.
     */
    public function withAccountName(string $accountName): self
    {
        $self = clone $this;
        $self['accountName'] = $accountName;

        return $self;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }
}
