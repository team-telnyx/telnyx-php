<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AzureConfigurationDataShape = array{
 *   account_key?: string|null, account_name?: string|null, bucket?: string|null
 * }
 */
final class AzureConfigurationData implements BaseModel
{
    /** @use SdkModel<AzureConfigurationDataShape> */
    use SdkModel;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $account_key = null,
        ?string $account_name = null,
        ?string $bucket = null,
    ): self {
        $obj = new self;

        null !== $account_key && $obj->account_key = $account_key;
        null !== $account_name && $obj->account_name = $account_name;
        null !== $bucket && $obj->bucket = $bucket;

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
