<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\AzureConfigurationData\Backend;

/**
 * @phpstan-type AzureConfigurationDataShape = array{
 *   backend: value-of<Backend>,
 *   account_key?: string|null,
 *   account_name?: string|null,
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
    #[Api(enum: Backend::class)]
    public string $backend;

    /**
     * Azure Blob Storage account key.
     */
    #[Api(optional: true)]
    public ?string $account_key;

    /**
     * Azure Blob Storage account name.
     */
    #[Api(optional: true)]
    public ?string $account_name;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Api(optional: true)]
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
        ?string $account_key = null,
        ?string $account_name = null,
        ?string $bucket = null,
    ): self {
        $obj = new self;

        $obj['backend'] = $backend;

        null !== $account_key && $obj->account_key = $account_key;
        null !== $account_name && $obj->account_name = $account_name;
        null !== $bucket && $obj->bucket = $bucket;

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
        $obj->account_key = $accountKey;

        return $obj;
    }

    /**
     * Azure Blob Storage account name.
     */
    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj->account_name = $accountName;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }
}
