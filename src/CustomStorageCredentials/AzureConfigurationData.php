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
        $obj = new self;

        $obj['backend'] = $backend;

        null !== $accountKey && $obj['accountKey'] = $accountKey;
        null !== $accountName && $obj['accountName'] = $accountName;
        null !== $bucket && $obj['bucket'] = $bucket;

        return $obj;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $obj = clone $this;
        $obj['backend'] = $backend;

        return $obj;
    }

    /**
     * Azure Blob Storage account key.
     */
    public function withAccountKey(string $accountKey): self
    {
        $obj = clone $this;
        $obj['accountKey'] = $accountKey;

        return $obj;
    }

    /**
     * Azure Blob Storage account name.
     */
    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj['accountName'] = $accountName;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj['bucket'] = $bucket;

        return $obj;
    }
}
